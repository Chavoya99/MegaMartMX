<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Proveedor;
use App\Models\Subcategoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'tipo_usuario' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'email' => 'cliente@gmail.com',
        ]);

        \App\Models\User::factory(5)->create();


        
        $this->call([
            CategoriaSeeder::class,
            SubcategoriaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
        ]);
    }
}
