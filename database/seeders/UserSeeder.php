<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('123456');

        $users = [
            // Admin (ID: 1)
            [
                'first_name'  => 'Ricardo',
                'middle_name' => 'Dela Cruz',
                'last_name'   => 'Santos',
                'email'       => 'admin@gmail.com',
                'password'    => $password,
                'role'        => 'admin',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:00:00',
                'updated_at'  => '2024-01-01 07:00:00',
            ],
            // Secretary (ID: 2)
            [
                'first_name'  => 'Maria Isabel',
                'middle_name' => 'Reyes',
                'last_name'   => 'Villanueva',
                'email'       => 'secretary1@gmail.com',
                'password'    => $password,
                'role'        => 'secretary',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:05:00',
                'updated_at'  => '2024-01-01 07:05:00',
            ],
            // Clerk 1 (ID: 3)
            [
                'first_name'  => 'Jose',
                'middle_name' => 'Bautista',
                'last_name'   => 'Mendoza',
                'email'       => 'clerk1@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:10:00',
                'updated_at'  => '2024-01-01 07:10:00',
            ],
            // Clerk 2 (ID: 4)
            [
                'first_name'  => 'Ana',
                'middle_name' => 'Torres',
                'last_name'   => 'Ramos',
                'email'       => 'clerk2@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:15:00',
                'updated_at'  => '2024-01-01 07:15:00',
            ],
            // Clerk 3 (ID: 5)
            [
                'first_name'  => 'Roberto',
                'middle_name' => 'Garcia',
                'last_name'   => 'Aquino',
                'email'       => 'clerk3@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:20:00',
                'updated_at'  => '2024-01-01 07:20:00',
            ],
            // Clerk 4 (ID: 6)
            [
                'first_name'  => 'Lourdes',
                'middle_name' => 'Navarro',
                'last_name'   => 'Castro',
                'email'       => 'clerk4@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:25:00',
                'updated_at'  => '2024-01-01 07:25:00',
            ],
            // Clerk 5 (ID: 7)
            [
                'first_name'  => 'Eduardo',
                'middle_name' => 'Pascual',
                'last_name'   => 'Flores',
                'email'       => 'clerk5@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:30:00',
                'updated_at'  => '2024-01-01 07:30:00',
            ],
            // Clerk 6 (ID: 8)
            [
                'first_name'  => 'Cristina',
                'middle_name' => 'Manalo',
                'last_name'   => 'Dela Torre',
                'email'       => 'clerk6@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:35:00',
                'updated_at'  => '2024-01-01 07:35:00',
            ],
            // Clerk 7 (ID: 9)
            [
                'first_name'  => 'Fernando',
                'middle_name' => 'Ilagan',
                'last_name'   => 'Guinto',
                'email'       => 'clerk7@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:40:00',
                'updated_at'  => '2024-01-01 07:40:00',
            ],
            // Clerk 8 (ID: 10)
            [
                'first_name'  => 'Nenita',
                'middle_name' => 'Salonga',
                'last_name'   => 'Evangelista',
                'email'       => 'clerk8@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:45:00',
                'updated_at'  => '2024-01-01 07:45:00',
            ],
            // Clerk 9 (ID: 11)
            [
                'first_name'  => 'Romulo',
                'middle_name' => 'Ocampo',
                'last_name'   => 'Batungbakal',
                'email'       => 'clerk9@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:50:00',
                'updated_at'  => '2024-01-01 07:50:00',
            ],
            // Clerk 10 (ID: 12)
            [
                'first_name'  => 'Glenda',
                'middle_name' => 'Ferrer',
                'last_name'   => 'Macalintal',
                'email'       => 'clerk10@gmail.com',
                'password'    => $password,
                'role'        => 'clerk',
                'status'      => 'active',
                'created_at'  => '2024-01-01 07:55:00',
                'updated_at'  => '2024-01-01 07:55:00',
            ],
        ];

        DB::table('users')->insert($users);
    }
}