<div>
    <br>
    <label for="categoria_id">Categoría</label>
    <select class="form-control" name="categoria_id" id="categoria" wire:model.live ="categoriaId" required>
        <option value="{{null}}">Selecciona una categoría</option>
        @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
        
    </select>
    @error('categoria_id')
        <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
    @enderror
    <br>
    <label for="subcategoria_id">Subcategoría</label>
    <select class="form-control" name="subcategoria_id" id="subcategoria" wire:model="subcategoriaId" required>
        <option value="{{null}}">Selecciona una subcategoría</option>
        @foreach ($subcategorias as $subcategoria)
            <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
        @endforeach
    </select>

    @error('subcategoria_id')
        <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
    @enderror
    <br>
</div>