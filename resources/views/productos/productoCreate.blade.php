<x-mi-layout titulo="Nuevo producto">
    <a class="btn btn-primary" href="{{route('producto.index')}}">&#129044;Regresar</a><br>
    <h3>Introducir los datos necesarios</h3>
    <form action="{{route('producto.store')}}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input class="form-control" name="nombre" type="text" value="{{old('nombre')}}">
        @error('nombre')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="categoria">Categoría</label>
        <select class="form-control" name="categoria" id="categoria">
            <option value="lacteos" @selected(old('categoria') == "energetizantes")>Lácteos</option>
            <option value="bebidas" @selected(old('categoria') == "bebidas")>Bebidas</option>
            <option value="botanas" @selected(old('categoria') == "botanas")>Botanas</option>
        </select>

        <br>
        <label for="subCategoria">Subcategoria</label>
        <select class="form-control" name="subCategoria" id="subCategoria">
            <option value="energetizantes" @selected(old('subCategoria') == "energetizantes")>Energetizantes</option>
            <option value="vinos y licores" @selected(old('subCategoria') == "vinos y licores")>Vinos y licores</option>
            <option value="frituras" @selected(old('subCategoria') == "frituras")>Frituras</option>
        </select>
        <br>            
        <label for="precio">Precio</label>
        <input class="form-control" name="precio" type="number" step="0.01" placeholder="ejemplo: 1.00" value="{{old('precio')}}">
        @error('precio')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        
        <br>
        <label for="codigoBarras">Código de barras</label>
        <input class="form-control" name="codigoBarras" type="text" value="{{old('codigoBarras')}}">
        @error('codigoBarras')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <button class="btn btn-primary" type="submit">Crear</button>
    </form>
</x-mi-layout>