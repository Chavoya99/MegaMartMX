<x-mi-layout titulo="Nuevo proveedor">
    <a class="btn btn-primary" href="{{route('proveedor.index')}}">&#129044;Regresar</a><br><br>
    <legend>Introduzca los siguientes datos</legend>
    <form action="{{route('proveedor.store')}}" method="POST">
    @csrf
        <label for="nombre">Nombre: </label>
        <input class="form-control" name="nombre" type="text" value="{{old('nombre')}}" placeholder="Ingrese su nombre" required>
        @error('nombre')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>
            
        <label for="direccion">Dirección: </label>
        <input class="form-control" name="direccion" type="text" value="{{old('direccion')}}" placeholder="Ingrese la dirección del proveedor" required>
        @error('direccion')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="telefono">Teléfono: </label>
        <input class="form-control" name="telefono" type="text" value="{{old('telefono')}}" placeholder="Ingrese el teléfono del proveedor" required>
        @error('telefono')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="correo">Correo electrónico: </label>
        <input class="form-control" name="correo" type="email" value="{{old('correo')}}" placeholder="Ingrese el correo del proveedor" required>
        @error('correo')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="estado">Estado: </label>
        <select class="form-control" name="estado" id="estado" required>
            <option value="activo" @selected(old('estado') == "activo")>Activo</option>
            <option value="inactivo" @selected(old('estado') == "inactivo")>Inactivo</option>
        </select>
        <br><br>

        <button class="btn btn-primary" type="submit">Crear</button>
    </form>
</x-mi-layout>
