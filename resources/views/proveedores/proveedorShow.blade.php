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
            <li><strong>Nombre:</strong> {{$proveedor->nombre}}</li>
            <li><strong>Dirección:</strong> {{$proveedor->direccion}}</li>
            <li><strong>Teléfono:</strong> {{$proveedor->telefono}}</li>
            <li><strong>Correo electrónico:</strong> {{$proveedor->correo}}</li>
            <li><strong>Estado:</strong> {{$proveedor->estado}}</li>
        </ul>
</body>
</html>