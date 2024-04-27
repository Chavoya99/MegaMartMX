<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['Sabritas Naturales 160g', 3, 7, 45, '100000', 5, 2],
            ['Coca Cola 1L', 1, 2, 32, '100001', 5, 3],
            ['Atun Dolores Agua', 3, 11, 20, '100002', 5, 1],
            ['Ruffles Queso 185g', 3, 7, 36, '100003', 5, 2]
        ];

        foreach($productos as $producto){
            Producto::create([
                'nombre' => $producto[0],
                'categoria_id' => $producto[1],
                'subcategoria_id' => $producto[2],
                'precio' => $producto[3],
                'codigoBarras' => $producto[4],
                'existencia' => $producto[5],
                'proveedor_id' => $producto[6]
            ]);
        }
    }
}
