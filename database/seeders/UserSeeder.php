<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstname' => 'Jay Noel',
                'middlename' => 'N',
                'lastname' => 'Rojo',
                'username' => 'rojo',
                'email' => 'rojo@gmail.com',
                'password' => Hash::make('rojo123'),
                'position_id' => 1,
                'usertype_id' => 1,
            ],
            [
                'firstname' => 'Mark Rywell',
                'middlename' => 'Gemina',
                'lastname' => 'Gaje',
                'username' => 'mark',
                'email' => 'mark@gmail.com',
                'password' => Hash::make('mark123'),
                'position_id' => 2,
                'usertype_id' => 2,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        User::factory(10)->create(['usertype_id' => 2, 'position_id' => 2]);
    }
}
