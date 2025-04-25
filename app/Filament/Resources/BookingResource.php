<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use App\Filament\Resources\BookingResource\Pages;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Booking Management';

    protected static ?string $navigationLabel = 'Booking';

    protected static ?string $label = 'Booking';

    protected static ?string $slug = 'booking';

    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Booking Details')
                ->schema([
                    Select::make('user_id')
                        ->label('Reservation By')
                        ->relationship('user', 'name')
                        ->required()
                        ->disabled(!Auth::user()->hasRole('super_admin')), // hanya admin bisa ubah pemesan
                    Select::make('room_id')
                        ->label('Room')
                        ->relationship('room', 'room_name')
                        ->required()
                        ->disabled(!Auth::user()->hasRole('super_admin')), // hanya admin bisa ubah ruangan
                ])->columns(2),
                Section::make('Booking Time')
                    ->schema([
                        DatePicker::make('date')
                            ->label('Tanggal')
                            ->required()
                            ->minDate(now()),

                        TimePicker::make('start_time')->label('Jam Mulai')->required()->reactive(),
                        TimePicker::make('end_time')->label('Jam Selesai')->required()->reactive(),
                    ])->columns(3),
                Textarea::make('note')->label('Catatan'),

                Select::make('status')
                    ->default('pending')
                    ->disabled(!Auth::user()->hasRole('super_admin')) // hanya admin bisa ubah status
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ]),
            ]);
    }

    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('room.room_name')->label('Ruangan'),
                TextColumn::make('user.name')->label('Pemesan'),
                TextColumn::make('date')->label('Tanggal')->date(),
                TextColumn::make('start_time')->label('Mulai'),
                TextColumn::make('end_time')->label('Selesai'),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(fn ($record) => $record->update(['status' => 'approved'])),

                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(fn ($record) => $record->update(['status' => 'rejected'])),
                Tables\Actions\EditAction::make(),
            ])
            ->filters([
                //
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make(),
            // ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected function getEvents(): array
    {
        return Booking::all()->map(function ($booking) {
            return [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start->toIso8601String(),
                'end' => $booking->end->toIso8601String(),
            ];
        })->toArray();
    }
}
