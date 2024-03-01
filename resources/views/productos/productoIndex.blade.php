<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
</head>
<body>
    <a class="btn btn-primary" href="{{route('producto.create')}}">Agregar producto</a><br><br>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>SubCategoría</th>
                <th>Precio</th>
                <th>Código de barras</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as  $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->categoria}}</td>
                    <td>{{$producto->subCategoria}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->codigoBarras}}</td>
                    <td>
                        <a href="{{route('producto.show', $producto)}}">Detalle</a> |
                        <a href="{{route('producto.edit', $producto)}}">Editar</a> |
                        <form action="{{route('producto.destroy', $producto)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar">
                        </form>
                        
                    </td>
                    
                </tr> 
            @endforeach
        </tbody>
    </table>
</body>
</html>