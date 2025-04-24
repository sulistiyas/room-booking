<?php

namespace App\Filament\Resources\BookingResource\Pages;

use Filament\Actions;
use App\Models\Booking;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\BookingResource;
use Illuminate\Validation\ValidationException;
use Filament\Notifications\Notification;
class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    protected function beforeCreate(): void
    {
        $data = $this->form->getState();

        try {
            if ($data['start_time'] >= $data['end_time']) {
                throw ValidationException::withMessages([
                    'end_time' => 'Jam selesai harus lebih besar dari jam mulai.',
                ]);
            }

            $bentrok = Booking::where('room_id', $data['room_id'])
                ->where('date', $data['date'])
                ->where('status', 'approved')
                ->where(function ($query) use ($data) {
                    $query->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                        ->orWhereBetween('end_time', [$data['start_time'], $data['end_time']])
                        ->orWhere(function ($q) use ($data) {
                            $q->where('start_time', '<=', $data['start_time'])
                            ->where('end_time', '>=', $data['end_time']);
                        });
                })
                ->exists();

            if ($bentrok) {
                throw ValidationException::withMessages([
                    'start_time' => 'Sudah ada booking lain yang bentrok pada jam ini.',
                ]);
            }

            $this->form->fill([
                'user_id' => auth()->id(),
            ]);
        } catch (ValidationException $e) {
            // Munculkan notifikasi manual
            Notification::make()
                ->title('Gagal membuat booking')
                ->body(collect($e->errors())->flatten()->first()) // ambil pesan pertama
                ->danger()
                ->send();

            throw $e; // Penting: tetap lempar ke Filament agar form tidak tersimpan
        }
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Booking berhasil dibuat')
            ->success()
            ->send();
    }
}
