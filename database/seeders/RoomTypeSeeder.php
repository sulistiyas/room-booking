<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $types = ['Meeting Room', 'Lab Komputer', 'Aula', 'Kelas', 'Studio'];
    
            foreach ($types as $type) {
                RoomType::create(['room_type_name' => $type]);
            }
        }
    }
}
