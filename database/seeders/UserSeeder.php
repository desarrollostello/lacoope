<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Mauro Tello',
            'email' => 'maurotello73@gmail.com',
            'password' => Hash::make('admin'),
        ])->assignRole('Admin');
        User::create([
            'name' => 'Desa Tello',
            'email' => 'desatello@gmail.com',
            'password' => Hash::make('desatello'),
        ])->assignRole('Escritor');
    }
}
