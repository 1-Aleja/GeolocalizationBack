<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['country_id' => 1, 'name' => 'Risaralda']);
        Department::create(['country_id' => 1, 'name' => 'Cundinamarca']);
        Department::create(['country_id' => 1, 'name' => 'Antioquia']);
        Department::create(['country_id' => 2, 'name' => 'Acre']);
        Department::create(['country_id' => 2, 'name' => 'Alagoas']);
        Department::create(['country_id' => 2, 'name' => 'Amazonas']);
        Department::create(['country_id' => 3, 'name' => 'Metropolitana de Santiago']);
        Department::create(['country_id' => 3, 'name' => 'Antofagasta']);
        Department::create(['country_id' => 3, 'name' => 'Coquimbo']);
    }
}
