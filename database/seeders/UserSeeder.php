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

        User::create([
            'name'  => 'Carlos',
            'email' => 'carlos@gmail.com',
            'dni'   => '23063818',
            'password' => Hash::make('password'),
        ])->assignRole('Escritor');
        User::create([
            'name'  => 'Eduardo',
            'email' => 'eduardo@gmail.com',
            'dni'   => '25063898',
            'password' => Hash::make('password'),
        ])->assignRole('Escritor');

        User::create([
            'name'  => 'Marcos',
            'email' => 'marcos@gmail.com',
            'dni'   => '23063898',
            'password' => Hash::make('password'),
        ])->assignRole('Escritor');
        User::create([
            'name'  => 'Maria',
            'email' => 'maria@gmail.com',
            'dni'   => '26063898',
            'password' => Hash::make('password'),
        ])->assignRole('Escritor');

        User::create([
            'name'  => 'Susana',
            'email' => 'susana@gmail.com',
            'dni'   => '28563898',
            'password' => Hash::make('password'),
        ])->assignRole('Escritor');
        User::create([
            'name'  => 'Azul',
            'email' => 'azul@gmail.com',
            'dni'   => '25993898',
            'password' => Hash::make('password'),
        ])->assignRole('Escritor');
    }
}
