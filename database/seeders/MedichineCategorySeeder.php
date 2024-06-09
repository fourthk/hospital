<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedichineCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medichine_categories')->insert([
            'name' => 'Antihistamine',
        ]);
        DB::table('medichine_categories')->insert([
            'name' => 'Simple non-opioid analgesics',
        ]);
        DB::table('medichine_categories')->insert([
            'name' => 'Compound analgesics',
        ]);
    }
}
