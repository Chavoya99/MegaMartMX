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
            ['Coca-Cola Retornable Original 3L', 1, 2, 41, '100001', 100, 3],
            ['Atun Dolores Agua', 3, 11, 20, '100002', 100, 1],
            ['Ruffles Queso 185g', 3, 7, 38, '100003', 100, 2],
            ['Fabuloso Fresca Lavanda 2L', 2, 5, 27, '100004', 100, 4],
            ['Pinol El original 1L', 2, 5, 31, '100005', 100, 4],
            ['Kit de limpieza Trapeador escoba y recogedor', 2, 4, 79, '100006', 100, 4],
            ['Leche Sello rojo entera 2L', 1, 14, 26, '100007', 100, 1],
            ['Salchichas Corona 1kg', 5, 13, 43, '100008', 100, 1],
            ['zanahoria 1kg',3 , 8, 28, '100009', 100, 1],
            ['uva verde 1kg', 3, 9, 43, '100010', 100, 1],
            ['Mango Kent 1kg', 3, 9, 49, '100011', 100, 1],
            ['Lechuga romana 1kg', 3, 8, 55, '100013', 100, 1],
            ['Jitomate 1kg', 3, 9, 27, '100014', 100, 1],
            ['Agua Ciel 1L pack de 6 pzas', 1, 3, 99, '100015', 100, 3],
            ['Seven Up 600ml', 1, 2, 17, '100016', 100, 3],
            ['Cereal Zucaritas 665g', 3, 6, 125, '100017', 100, 1],
            ['Riunite Lambrusco Tinto 750ML', 1, 1, 299, '100018', 100, 1],
            ['Vino Blanco L.A. Cetto Blanc de Blancs 750mL', 1, 1, 299, '100019', 100, 1],
            ['Riunite Lambrusco Rosado 750ML', 1, 1, 299, '100020', 100, 1],
            ['Don Julio 70 700ml', 1, 1, 499, '100021', 100, 1],
            ['Whisky Black & White 700ml', 1, 1, 349, '100022', 100, 1],
            ['Bacardi ron añejo 200ml', 1, 1, 549, '100023', 100, 1],
            ['Pepsi Original 2L', 1, 2, 35, '100024', 100, 1],
            ['Fanta Sabor Naranja 600mL', 1, 2, 18, '100025', 100, 1],
            ['Fresca sabor toronja 3L', 1, 2, 41, '100026', 100, 1],
            ['Sidral Mundet Lata 355ml', 1, 2, 14, '100027', 100, 1],
            ['Agua Ciel 2L', 1, 3, 20, '100028', 100, 1],
            ['Agua Natural Bonafont 6L', 1, 3, 60, '100029', 100, 1],
            ['Agua Natural Bonafont 750ml', 1, 3, 15, '100030', 100, 1],
            ['Agua epura 1L', 1, 3, 20, '100031', 100, 1],
            ['Agua epura 10L', 1, 3, 100, '100032', 100, 1],
            ['Pan blanco Bimbo grande 680g', 3, 6, 65, '100033', 100, 1],
            ['Bimbo Panqué con Pasas 255g', 3, 6, 22, '100034', 100, 1],
            ['Pan Bimbo Multigrano 610gr', 3, 6, 69, '100035', 100, 1],
            ['Cereal Froot Loops 410g', 3, 6, 49, '100036', 100, 1],
            ['Cereal integral Fitness miel y almendras 390g', 3, 6, 45, '100037', 100, 1],
            ['Doritos Incógnita 255g', 3, 7, 45, '100038', 100, 1],
            ['Cilantro 250g', 3, 8, 25, '100039', 100, 1],
            ['Sandia 1pza', 3, 9, 33, '100040', 100, 1],
            ['Piña 1pza', 3, 9, 39, '100041', 100, 1],
            ['Brocoli 500g', 3, 8, 33, '100042', 100, 1],
            ['Coliflor 500g', 3, 8, 39, '100043', 100, 1],
            ['Aguacate 500g', 3, 9, 89, '100044', 100, 1],
            ['Apio 500g', 3, 8, 16, '100045', 100, 1],
            ['Jamón de pavo FUD 450g', 5, 13, 89, '100046', 100, 1],
            ['Salchicha Cocktail Pavo San Rafael 500gr', 5, 13, 120, '100047', 100, 1],
            ['Leche Lala light 1L', 5, 14, 49, '100048', 100, 1],
            ['Leche Santa Clara Deslactosada 1L', 5, 14, 25, '100049', 100, 1],
            ['La lechera 335g', 3, 14, 59, '100050', 100, 1],
            ['Avena Fortificada 3 Minutos 400 g', 3, 6, 34, '100051', 100, 1]
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
                        'nombre_original' => strtr($producto[0], " ", "_"). ".".pathinfo($rutaImagen, PATHINFO_EXTENSION),
                        'mime' => $archivoSimulado->getClientMimeType(),
                    ]
                );
            }

            
            
        }
    }
}
