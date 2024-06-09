<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedichineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medichines')->insert([
            'id_category' => '1',
            'name' => 'Cetirizine HCL 10 Mg contains 50 Tablets',
            'price' => '22.000',
            'description' => 'an antihistamine used to relieve allergy symptoms such as watery eyes, runny nose, itching eyes/nose, and sneezing. It is also used to treat itching and swelling caused by chronic urticaria (hives). Cetirizine works by blocking a certain natural substance (histamine) that your body makes during an allergic reaction.'
        ]);
        DB::table('medichines')->insert([
            'id_category' => '1',
            'name' => 'Loratadine 10 Mg contains 10 Tablets',
            'price' => '4000',
            'description' => 'an antihistamine that provides relief from allergy symptoms such as runny nose, sneezing, itchy or watery eyes, and itchy throat or nose. It is also effective in treating itching and redness caused by chronic skin reactions such as hives. Loratadine is known for its non-drowsy formula, making it a convenient option for daytime use.'
        ]);
        DB::table('medichines')->insert([
            'id_category' => '1',
            'name' => 'Levocetirizine Dihydrochloride Interbat 5 Mg Strip 10 Tablets ',
            'price' => '135000',
            'description' => 'an effective antihistamine used to alleviate symptoms of allergic rhinitis (hay fever) such as sneezing, runny nose, and itchy or watery eyes. It is also beneficial in treating symptoms of chronic idiopathic urticaria (hives), including itching and rash. Levocetirizine is known for its rapid onset of action and long-lasting relief, typically providing symptom relief for 24 hours. '
        ]);
    }
}
