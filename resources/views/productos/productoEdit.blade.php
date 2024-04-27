<x-milayout titulo="Editar producto">
    <a class="btn btn-primary" href="{{route('producto.index')}}">&#129044;Regresar</a><br>
    <h3>Introducir los datos necesarios</h3>
    <form action="{{route('producto.update', $producto)}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre</label>
        <input class="form-control" name="nombre" type="text" value="{{old('nombre') ?? $producto->nombre}}" required>
        @error('nombre')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        
        @livewire('dropdown2', ['id' => $producto->id])
        

        <label for="precio">Precio</label>
        <input class="form-control" name="precio" type="number" step="0.01" value="{{old('precio') ?? $producto->precio}}" required>
        @error('precio')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="codigoBarras">Código de barras</label>
        <input class="form-control" name="codigoBarras" type="text" value="{{old('codigoBarras') ?? $producto->codigoBarras}}" required>
        @error('codigoBarras')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="existencia">Existencia</label>
        <input class="form-control" name="existencia" type="number" value="{{old('existencia') ?? $producto->existencia}}" required>
        @error('existencia')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="proveedor_id">Proveedor</label>
        <select class="form-control" name="proveedor_id" id="proveedor" required>
            <option value="{{null}}">Selecciona un proveedor</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{$proveedor->id}}"
                @if($proveedor->id == old('proveedor_id') || $proveedor->id == $producto->proveedor->id) selected @endif>
                {{$proveedor->nombre}}</option>
                
            @endforeach
        </select>
        @error('proveedor_id')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror

        <br>
        <button class="btn btn-primary" type="submit">Editar</button>
    </form>
</x-mi-layout>