<x-milayout titulo="Editar producto">
    <a class="btn btn-primary" href="{{route('producto.index')}}">&#129044;Regresar</a><br>
    <h3>Introducir los datos necesarios</h3>
    <form action="{{route('producto.update', $producto)}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre</label>
        <input class="form-control" name="nombre" type="text" value="{{old('nombre') ?? $producto->nombre}}">
        @error('nombre')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="categoria">Categoría</label>
        <select class="form-control" name="categoria" id="categoria">
            <option value="lacteos" @selected((old('categoria') ?? $producto->categoria) == "lacteos")>Lácteos</option>
            <option value="bebidas" @selected((old('categoria') ?? $producto->categoria) == "bebidas")>Bebidas</option>
            <option value="botanas" @selected((old('categoria') ?? $producto->categoria) == "botanas")>Botanas</option>
        </select>

        <br>
        <label for="subCategoria">Subcategoria</label>
        <select class="form-control" name="subCategoria" id="subCategoria">
            <option value="energetizantes" @selected((old('subCategoria') ?? $producto->subCategoria) == "energetizantes")>Energetizantes</option>
            <option value="vinos y licores" @selected((old('subCategoria') ?? $producto->subCategoria) == "vinos y licores")>Vinos y licores</option>
            <option value="frituras" @selected((old('subCategoria') ?? $producto->subCategoria) == "frituras")>Frituras</option>
        </select>
        <br>            
        <label for="precio">Precio</label>
        <input class="form-control" name="precio" type="number" step="0.01" value="{{old('precio') ?? $producto->precio}}">
        @error('precio')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="codigoBarras">Código de barras</label>
        <input class="form-control" name="codigoBarras" type="text" value="{{old('codigoBarras') ?? $producto->codigoBarras}}">
        @error('codigoBarras')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <button class="btn btn-primary" type="submit">Editar</button>
    </form>
</x-mi-layout>