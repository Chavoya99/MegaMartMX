<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'nombre' => 'Proveedor Walmart',
            'direccion' => 'Calzada Independencia Sur',
            'correo' => 'walmart@walmart.mx',
            'telefono' => '3355665555',
            'estado' => 'activo',
        ]);

        Proveedor::create([
            'nombre' => 'Pepsico',
            'direccion' => 'Calzada Lázaro Cardenas',
            'correo' => 'pepsico@pepsico.mx',
            'telefono' => '3355666666',
            'estado' => 'activo',
        ]);

        Proveedor::create([
            'nombre' => 'Coca-Cola Company',
            'direccion' => 'Calzada Independencia Norte',
            'correo' => 'cocacola@cocacola.mx',
            'telefono' => '3377889999',
            'estado' => 'activo',
        ]);
    }
}
