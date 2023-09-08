<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'operator', 'email' => 'operator@gmail.com', 'password' => 'password', 'role' => 'operator' , 'kelas' => 'operator'],
            ['name' => 'walikelas1', 'email' => 'walikelas1@gmail.com', 'password' => 'password', 'role' => 'walikelas', 'kelas' => 'XII AP 1'],
            ['name' => 'walikelas2', 'email' => 'walikelas2@gmail.com', 'password' => 'password', 'role' => 'walikelas', 'kelas' => 'XII AP 2']
        ];

        foreach ($data as $item) {
            User::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => Hash::make($item['password']),
                'role' => $item['role'],
                'kelas' => $item['kelas'],
            ]);
        }
    }
}
