<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->insert([
            'no_appointment' => '001',
            'id_user' => '4',
            'id_doctor' => '2',
            'id_plan' => '1',
            'telephone' => '083192',
            'status' => '0',
            'status_payment' => '0',
            'date' => '2024-05-16',
            'description' => 'Saya sakit pusing kepala'
        ]);
    }
}
