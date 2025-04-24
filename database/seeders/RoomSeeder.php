<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meeting = RoomType::where('room_type_name', 'Meeting Room')->first();
        $lab = RoomType::where('room_type_name', 'Lab Komputer')->first();

        Room::create([
            'room_name' => 'Meeting Room A',
            'room_description' => 'Ruang meeting lantai 2',
            'room_type_id' => 1,
        ]);

        Room::create([
            'room_name' => 'Lab Komputer 1',
            'room_description' => 'Lab dengan 20 PC',
            'room_type_id' => 2,
        ]);
    }
}
