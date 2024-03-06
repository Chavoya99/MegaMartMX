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
        <fieldset>
            <legend>Datos del proveedor</legend>
            <label for="nombre">Nombre: </label>
            <input name="nombre" type="text" value="{{old('nombre') ?? $proveedor->nombre}}"placeholder="Ingrese el nombre del proveedor" size="27" >
            @error('nombre')
                <div class="alert alert-danger" style="color:red">{{ $message }}</div>
            @enderror
            <br><br>
            
            <label for="direccion">Direccion: </label>
            <input name="direccion" type="text" value="{{old('direccion') ?? $proveedor->direccion}}" placeholder="Ingrese la dirección del proveedor" size="26">
            @error('direccion')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
            @enderror
            <br><br>

            <label for="telefono">Telefono: </label>
            <input name="telefono" type="text" value="{{old('telefono') ?? $proveedor->telefono}}" placeholder="Ingrese el teléfono del proveedor" size="27">
            @error('telefono')
                <div class="alert alert-danger" style="color:red">{{ $message }}</div>
            @enderror
            <br><br>

            <label for="correo">Correo electronico: </label>
            <input name="correo" type="text" value="{{old('correo') ?? $proveedor->correo}}" placeholder="Ingrese el correo del proveedor" size="25">
            @error('correo')
                <div class="alert alert-danger" style="color:red">{{ $message }}</div>
            @enderror
            <br><br>

            <label for="estado">Estado: </label>
            <select name="estado" id="estado">
                <option value="activo" @selected(old('estado') ?? $proveedor->estado == "activo")>Activo</option>
                <option value="inactivo" @selected(old('estado') ?? $proveedor->estado == "inactivo")>Inactivo</option>
            </select>
            <br><br>

            <button type="submit">Modificar</button>
        </fieldset>
    </form>
</body>
</html>
