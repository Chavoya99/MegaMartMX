<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            ['Sabritas Naturales 160g', 3, 7, 40, '100000', 100, 2],
            ['Refresco Retornable Coca-Cola Original 3L', 1, 2, 41, '100001', 100, 3],
            ['Atun Dolores Agua', 3, 11, 20, '100002', 100, 1],
            ['Ruffles Queso 185g', 3, 7, 38, '100003', 100, 2]
        ];

        foreach($productos as $producto){
            $nuevoProducto = Producto::create([
                'nombre' => $producto[0],
                'categoria_id' => $producto[1],
                'subcategoria_id' => $producto[2],
                'precio' => $producto[3],
                'codigoBarras' => $producto[4],
                'existencia' => $producto[5],
                'proveedor_id' => $producto[6]
            ]);

            $rutaImagen = public_path('img/imagenes_producto_prueba/'. strtr($producto[0], " ", "_") . ".png");

            if(File::exists($rutaImagen)){
                
                $archivoSimulado = new UploadedFile(
                    $rutaImagen,
                    pathinfo($rutaImagen, PATHINFO_EXTENSION),
                    'image/png',
                );
        
                $ubicacion = $archivoSimulado->store('archivos_productos', 'public');
                $nuevoProducto->archivo()->create(
                    [
                        'ubicacion' => $ubicacion,
                        'nombre_original' => strtr($producto[0], " ", "_"). ".png",
                        'mime' => $archivoSimulado->getClientMimeType(),
                    ]
                );
            }

            
            
        }
    }
}
