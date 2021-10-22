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
            'nombres'         => 'Pedro',
            'apellidos'       => 'Guzmán',
            'correo'          => 'dev@gmail.com',
            'telefono'        => '9622162349',
            'status'          => true,
            'password'        => Hash::make('12345'),
            'usuario'         => 'super'
        ])->assignRole('Super administrador');

        /*
        User::create([
            'nombres'         => 'Pedro',
            'apellidos'       => 'Ruiz',
            'correo'          => 'admin@gmail.com',
            'telefono'        => '9622162350',
            'status'          => true,
            'password'        => Hash::make('admin'),
            'usuario'         => 'admin'
        ])->assignRole('Administrador');
        */

    }

    
}
