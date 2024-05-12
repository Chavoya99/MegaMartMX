<?php

namespace App\Livewire;

use App\Models\Compra;
use Livewire\Component;

class IconoCarrito extends Component
{
    public $items;

    public function actualizarIconoCarrito(){
        $this->items = 0;
        $carrito = session()->get('carrito');
        if($carrito){
            foreach($carrito as $item){
                $this->items += $item['cantidad'];
            }
        }else{
            $this->items = 0;
        }
    }

    public function mount()
    {   
        $this->actualizarIconoCarrito();
    }

    public function render()
    {   
        return view('livewire.icono-carrito');
    }
}
