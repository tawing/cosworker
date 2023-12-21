<?php

namespace Database\Seeders;

use App\Models\Educations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Educations::factory(10)->create();
    }
}
