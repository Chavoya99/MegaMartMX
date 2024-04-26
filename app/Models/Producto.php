<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'nombre',
        'categoria_id',
        'subcategoria_id',
        'precio',
        'codigoBarras',
        'existencia',
        'proveedor_id',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
