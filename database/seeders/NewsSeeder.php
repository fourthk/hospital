<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            'title' => 'Global Health Funding',
            'date' => '2024-06-02',
            'img_url' => 'http://localhost/joki/victoria%20last/victoria/image/blog-3.jpg',
            'news_url' => 'https://www.chathamhouse.org/about-us/our-departments/global-health-programme/international-funding-global-health-priorities',
        ]);
        DB::table('news')->insert([
            'title' => 'Well-Defined Role in Global Health',
            'date' => '2024-06-02',
            'img_url' => 'http://localhost/joki/victoria%20last/victoria/image/blog-2.jpg',
            'news_url' => 'https://www.chathamhouse.org/2023/04/ifis-need-well-defined-role-global-health',
        ]);
        DB::table('news')->insert([
            'title' => 'Bionic pancreas’ in San Antonio',
            'date' => '2024-06-02',
            'img_url' => 'http://localhost/joki/victoria%20last/victoria/image/blog-1.jpg',
            'news_url' => 'https://sanantonioreport.org/san-antonio-ilet-insulin-bionic-pancreas-test-type-1-diabetes/',
        ]);
    }
}
