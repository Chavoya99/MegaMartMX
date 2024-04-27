<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Livewire\Component;

class Dropdown extends Component
{
    public $categorias;
    public $subcategorias = [];
    public $categoriaId;
    public $subcategoriaId;
    

    public function mount(){
        $this->categorias = Categoria::orderBy('nombre')->get();
        $this->categoriaId = old('categoria_id', $this->categoriaId);
        $this->subcategorias = Subcategoria::where('categoria_id', old('categoria_id', $this->categoriaId))->orderBy('nombre')->get();
        $this->subcategoriaId = old('subcategoria_id', $this->subcategoriaId);
    }

    public function updatedcategoriaId($valor){
        $this->subcategorias = Subcategoria::where('categoria_id', $valor)->orderBy('nombre')->get();
    }

    public function render()
    {
        return view('livewire.dropdown');
    }
}
