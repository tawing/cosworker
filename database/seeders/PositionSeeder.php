<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'position_id' => 1,
            'position_name' => 'Administrator'
        ]);

        Position::create([
            'position_id' => 2,
            'position_name' => 'Human Resource Staff'
        ]);
    }
}
