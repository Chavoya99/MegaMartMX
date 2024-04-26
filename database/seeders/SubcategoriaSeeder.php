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
        $subcategorias = ['Lácteos'=>1, 'Vinos y licores' =>1, 'Refrescos' => 1, 
        'Muebles' => 2, 'Cereales' => 3, 'Frituras' => 3,'Videojuegos'=> 4];
        foreach($subcategorias as $subcategoria => $valor){
            subcategoria::create([
                'nombre' => $subcategoria,
                'categoria_id' => $valor,
            ]);
        }
    }
}
