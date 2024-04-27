<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $subcategorias = ['Vinos y licores' =>1, 'Refrescos' => 1, 'Agua' => 1,
        'Muebles' => 2, 'Limpieza' => 2,
        'Cereales' => 3, 'Frituras' => 3, 'Verduras' => 3, 'Frutas' => 3, 'Carnicería' => 3, 'Enlatados' => 3,
        'Videojuegos'=> 4,
        'Carnes Frías' => 5, 'Lácteos' => 5,
        'Cuidado del cabello' => 6, 'Cuidado de la piel' => 6];
        foreach($subcategorias as $subcategoria => $valor){
            subcategoria::create([
                'nombre' => $subcategoria,
                'categoria_id' => $valor,
            ]);
        }
    }
}
