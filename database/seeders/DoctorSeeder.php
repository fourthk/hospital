<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->insert([
            'id_user' => '2',
            'id_specialis' => '1'
        ]);
        DB::table('doctors')->insert([
            'id_user' => '3',
            'id_specialis' => '1'
        ]);
    }
}
