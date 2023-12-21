<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usertypes = [
            [
                'usertype_name' => 'Administrator',
            ],
            [
                'usertype_name' => 'User',
            ]
        ];

        foreach ($usertypes as $usertype) {
            UserType::create($usertype);
        }
    }
}
