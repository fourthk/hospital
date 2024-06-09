<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // call all seeder
        $this->call(SpecialisSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(AppointmentSeeder::class);

        $this->call(MedichineCategorySeeder::class);
        $this->call(MedichineSeeder::class);

        $this->call(NewsSeeder::class);
    }
}
