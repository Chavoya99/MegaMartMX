<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del proveedor</title>
</head>
<body>
    <a href="{{route('proveedor.index')}}">Inicio</a>
    <h1>Datos del proveedor</h1>
    <ul>
        <li>Nombre: {{$proveedor->nombre}}</li>
        <li>Direccion: {{$proveedor->direccion}}</li>
        <li>Telefono: {{$proveedor->telefono}}</li>
        <li>Correo: {{$proveedor->correo}}</li>
        <li>Estado: {{$proveedor->estado}}</li>
    </ul>
</body>
</html>