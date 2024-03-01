<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del producto</title>
</head>
<body>
    <a href="{{route('producto.index')}}">Inicio</a>
    <h1>Detalle del producto</h1>
    <ul>
        <li>Nombre: {{$producto->nombre}}</li>
        <li>Categoría: {{$producto->categoria}}</li>
        <li>Subcategoría: {{$producto->subCategoria}}</li>
        <li>Precio: {{$producto->precio}}</li>
        <li>Código de barras: {{$producto->codigoBarras}}</li>
    </ul>
</body>
</html>