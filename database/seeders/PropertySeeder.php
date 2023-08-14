<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'name_owner' => 'Propietario 1',
            'email_owner' => 'propietario1@example.com',
            'residential_set' => 'Conjunto Residencial A',
            'tower' => 'Torre 1',
            'appartment' => 'Apartamento 101',
            'address' => 'Calle 123, Pereira',
            'sector_id' => 1,
            'city_id' => 1,
        ]);
        Property::create([
            'name_owner' => 'Propietario 2',
            'email_owner' => 'propietario2@example.com',
            'residential_set' => 'Conjunto Residencial A1',
            'tower' => 'Torre 2',
            'appartment' => 'Apartamento 105',
            'address' => 'Calle 123, Rio Branco',
            'sector_id' => 2,
            'city_id' => 2,
        ]);
        Property::create([
            'name_owner' => 'Propietario 3',
            'email_owner' => 'propietario3@example.com',
            'residential_set' => 'Conjunto Residencial A3',
            'tower' => 'Torre 3',
            'appartment' => 'Apartamento 103',
            'address' => 'Calle 123, Santiago',
            'sector_id' => 3,
            'city_id' => 3,
        ]);
    }
}
