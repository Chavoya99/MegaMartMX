<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de proveedores</title>
</head>
<body>
<a class="btn btn-primary" href="{{route('proveedor.create')}}">Agregar proveedor</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as  $proveedor)
                <tr>
                    <td>{{$proveedor->nombre}}</td>
                    <td>{{$proveedor->producto}}</td>
                    <td>{{$proveedor->direccion}}</td>
                    <td>{{$proveedor->correo}}</td>
                    <td>{{$proveedor->telefono}}</td>
                    <td>
                        <a href="{{route('proveedor.show', $proveedor)}}">Detalle</a> |
                        <a href="{{route('proveedor.edit', $proveedor)}}">Editar</a> |
                        <form action="{{route('proveedor.destroy', $proveedor)}}" method="POST">
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