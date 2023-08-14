<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sector::create(['city_id' => 1, 'name' => 'Sector Norte']);
        Sector::create(['city_id' => 2, 'name' => 'Sector Sur']);
        Sector::create(['city_id' => 3, 'name' => 'Sector Central']);
        Sector::create(['city_id' => 4, 'name' => 'Sector Norte']);
        Sector::create(['city_id' => 5, 'name' => 'Sector Sur']);
        Sector::create(['city_id' => 6, 'name' => 'Sector Central']);
        Sector::create(['city_id' => 7, 'name' => 'Sector Norte']);
        Sector::create(['city_id' => 8, 'name' => 'Sector Sur']);
        Sector::create(['city_id' => 9, 'name' => 'Sector Central']);
    }
}
