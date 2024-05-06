<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='proveedores';

    protected $fillable = [
        'nombre', 
        'direccion',
        'correo',
        'telefono',
        'estado',
    ];
    public function productos(){
        return $this->hasMany(Producto::class)->withTrashed();
    }


    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($proveedor) {
            $proveedor->productos()->delete();
        });
    }

}