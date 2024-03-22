<x-milayout titulo="Editar proveedor">
    <a class="btn btn-primary" href="{{route('proveedor.index')}}">&#129044;Regresar</a><br>
    <h3>Introduzca los siguientes datos</h3>
    <form action="{{route('proveedor.update', $proveedor)}}" method="POST">
    @csrf
    @method('PATCH')
        <legend>Datos del proveedor</legend>
        <label for="nombre">Nombre: </label>
        <input class="form-control" name="nombre" type="text" value="{{old('nombre') ?? $proveedor->nombre}}"placeholder="Ingrese el nombre del proveedor">
        @error('nombre')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>
            
        <label for="direccion">Direccion: </label>
        <input class="form-control" name="direccion" type="text" value="{{old('direccion') ?? $proveedor->direccion}}" placeholder="Ingrese la dirección del proveedor">
        @error('direccion')
        <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="telefono">Telefono: </label>
        <input class="form-control" name="telefono" type="text" value="{{old('telefono') ?? $proveedor->telefono}}" placeholder="Ingrese el teléfono del proveedor">
        @error('telefono')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="correo">Correo electronico: </label>
        <input class="form-control" name="correo" type="text" value="{{old('correo') ?? $proveedor->correo}}" placeholder="Ingrese el correo del proveedor">
        @error('correo')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="estado">Estado: </label>
        <select class="form-control" name="estado" id="estado">
            <option value="activo" @selected((old('estado') ?? $proveedor->estado) == "activo")>Activo</option>
            <option value="inactivo" @selected((old('estado') ?? $proveedor->estado) == "inactivo")>Inactivo</option>
        </select>
        <br><br>

        <button class="btn btn-primary" type="submit">Modificar</button>
    </form>
</x-milayout>
