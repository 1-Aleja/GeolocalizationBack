<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PropertySeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CitiesSeeder::class);
    }
    
}
