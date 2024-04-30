<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Compra extends Model
{
    use HasFactory;

    protected $casts = ['fecha' => 'datetime:d-m-Y H:i:s'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)->withPivot('cantidad', 'subtotal');
    }
}
