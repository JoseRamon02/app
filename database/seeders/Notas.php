<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Notas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notas')->insert([
            'nombre' => 'Ejemplo 1',
            'descripcion' => 'Esta es la descripción del Ejemplo 1.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('notas')->insert([
            'nombre' => 'Ejemplo 2',
            'descripcion' => 'Esta es la descripción del Ejemplo 2.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
