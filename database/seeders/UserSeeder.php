<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed user manual
        DB::table('users')->insert([
            'username' => 'admin',
            'fullname' => 'admin',
            'telephone' => '0831',
            'nik' => '000',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        DB::table('users')->insert([
            'username' => 'azza',
            'fullname' => 'azza',
            'telephone' => '0831',
            'nik' => '000',
            'role' => 'doctor',
            'email' => 'azza@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        DB::table('users')->insert([
            'username' => 'sonia',
            'fullname' => 'sonia',
            'telephone' => '0831',
            'nik' => '000',
            'role' => 'doctor',
            'email' => 'sonia@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        DB::table('users')->insert([
            'username' => 'agus',
            'fullname' => 'agus',
            'telephone' => '0831',
            'nik' => '000',
            'role' => 'user',
            'email' => 'agus@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }
}
