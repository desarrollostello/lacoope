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
            'dni'   => '23063889',
            'password' => Hash::make('admin'),
        ])->assignRole(['Admin', 'Escritor']);
        User::create([
            'name'  => 'Desa Tello',
            'email' => 'desatello@gmail.com',
            'dni'   => '23063888',
            'password' => Hash::make('desatello'),
        ])->assignRole('Escritor');
    }
}
