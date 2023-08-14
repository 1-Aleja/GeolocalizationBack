<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create(['department_id' => 1, 'name' => 'Pereira']);
        City::create(['department_id' => 2, 'name' => 'Fusagasugá']);
        City::create(['department_id' => 3, 'name' => 'Medellín']);
        City::create(['department_id' => 4, 'name' => 'Rio Branco']);
        City::create(['department_id' => 5, 'name' => 'Arapiraca']);
        City::create(['department_id' => 6, 'name' => 'Manaus']);
        City::create(['department_id' => 7, 'name' => 'Santiago']);
        City::create(['department_id' => 8, 'name' => 'Calama']);
        City::create(['department_id' => 9, 'name' => 'Coquimbo']);
    }
}
