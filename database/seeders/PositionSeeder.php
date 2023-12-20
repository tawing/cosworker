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

        $positions = [
            [
                'position_id' => 1,
                'position_name' => 'Administrator'
            ],
            [
                'position_id' => 2,
                'position_name' => 'Human Resource Staff'
            ]
        ];
        
        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
