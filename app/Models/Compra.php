<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compra extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = ['fecha' => 'datetime:d-m-Y H:i:s'],
    $fillable = ['user_id', 'subtotal', 'envio','total','fecha'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)
        ->withPivot('nombre_producto', 'cantidad', 'precio_unitario', 'subtotal');
    }
}
