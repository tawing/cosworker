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
        User::create(
            [
                'firstname' => 'Jay Noel',
                'middlename' => 'N',
                'lastname' => 'Rojo',
                'username' => 'rojo',
                'email' => 'rojo@gmail.com',
                'password' => Hash::make('rojo123'),
                'position_id' => '1',
                'usertype_id' => '1',
            ]
    
    );
    }
}
