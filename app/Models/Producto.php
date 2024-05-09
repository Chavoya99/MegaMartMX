<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function archivo(){
        return $this->hasOne(Archivo::class);
    }

    public function compras(){
        return $this->belongsToMany(Compra::class)
        ->withPivot('nombre_producto', 'cantidad', 'precio_unitario', 'subtotal');
    }
}
