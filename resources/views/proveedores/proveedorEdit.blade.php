<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo proveedor</title>
</head>
<body>
    <a href="{{route('proveedor.index')}}">Cancelar</a><br>
    <h1>Editar Proveedor</h1>
    <h2>modifique los siguientes datos</h2>
    <form action="{{route('proveedor.update', $proveedor)}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" value="{{old('nombre') ?? $proveedor->nombre}}">
        @error('nombre')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br>
           
        <label for="direccion">Direccion</label>
        <input name="direccion" type="text" value="{{old('direccion') ?? $proveedor->direccion}}">
        @error('direccion')
        <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br>

        <label for="telefono">Telefono</label>
        <input name="telefono" type="text" value="{{old('telefono') ?? $proveedor->telefono}}">
        @error('telefono')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br>

        <label for="correo">Correo electronico</label>
        <input name="correo" type="text" value="{{old('correo') ?? $proveedor->correo}}">
        @error('correo')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
        @enderror
        <br>

        <label for="estado">Estado</label>
        <select name="estado" id="estado">
            <option value="activo" @selected(old('estado') ?? $proveedor->estado == "activo")>Activo</option>
            <option value="inactivo" @selected(old('estado') ?? $proveedor->estado == "inactivo")>Inactivo</option>
        </select>
        <br>

        <button type="submit">Modificar</button>
    </form>
</body>
</html>
