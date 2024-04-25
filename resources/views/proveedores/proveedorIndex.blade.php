<x-mi-layout titulo="Lista de proveedores">
    <a class="btn btn-primary" href="{{route('proveedor.create')}}">Agregar proveedor</a><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as  $proveedor)
                    <tr>
                        <td>{{$proveedor->nombre}}</td>
                        <td>{{$proveedor->direccion}}</td>
                        <td>{{$proveedor->correo}}</td>
                        <td>{{ucfirst($proveedor->telefono)}}</td>
                        <td>{{$proveedor->estado}}</td>
                        <td>
                            <a class="btn btn-primary mt-1" href="{{route('proveedor.show', $proveedor)}}"> <i class="fa fa-info-circle"></i>Detalles</a>
                            <a class="btn btn-success mt-1" href="{{route('proveedor.edit', $proveedor)}}">&#x270E;Editar</a>
                            <form onsubmit="return confirm('Se eliminará el siguiente registro, ¿Desea continuar?')" action="{{route('proveedor.destroy', $proveedor)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger mt-1" type="submit" value="x Eliminar">
                            </form>                       
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </x-mi-layout>