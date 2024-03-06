<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo proveedor</title>
</head>
<body>
    <a href="{{route('proveedor.index')}}">Cancelar</a><br>
    <h1>Nuevo Proveedor</h1>
    <h2>Introduzca los siguientes datos</h2>
    <form action="{{route('proveedor.store')}}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" value="{{old('nombre')}}">
        @error('nombre')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
           
        <label for="direccion">Direccion</label>
        <input name="direccion" type="text" value="{{old('direccion')}}">
        @error('direccion')
        <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="telefono">Telefono</label>
        <input name="telefono" type="text" value="{{old('telefono')}}">
        @error('telefono')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="correo">Correo electronico</label>
        <input name="correo" type="text" value="{{old('correo')}}">
        @error('correo')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="estado">Estado</label>
        <select name="estado" id="cestado">
            <option value="activo" @selected(old('estado') == "activo")>Activo</option>
            <option value="inactivo" @selected(old('estado') == "inactivo")>Inactivo</option>
        </select>
        <br>

        <button type="submit">Crear</button>
    </form>
</body>
</html>
