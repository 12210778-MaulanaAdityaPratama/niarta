<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Hapus data yang ada di tabel users
     DB::table('users')->truncate();

     // Tambahkan data pengguna baru
     DB::table('users')->insert([
         [
             'name' => 'aditya',
             'email' => 'aditya@gmail.com',
             'password' => Hash::make('123'),
             'email_verified_at' => now(),
             'role' => 'admin',
             'created_at' => now(),
             'updated_at' => now(),
         ],
         [
             'name' => 'maulana',
             'email' => 'maulana@gmail.com',
             'password' => Hash::make('123'),
             'email_verified_at' => now(),
             'role' => 'user',
             'created_at' => now(),
             'updated_at' => now(),
         ],
         // Tambahkan data pengguna lainnya sesuai kebutuhan
     ]);
 }
}
