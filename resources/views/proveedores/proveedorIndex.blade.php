<x-admin-layout titulo="Lista de proveedores">
    
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    
    <a class="btn btn-primary" href="{{route('proveedor.create')}}">Agregar proveedor</a><br><br>
    <div class="table-responsive">    
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="bg-primary text-white">
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
                        <td>{{$proveedor->telefono}}</td>
                        <td>{{ucfirst($proveedor->estado)}}</td>
                        <td>
                            <a class="btn btn-primary mt-1" href="{{route('proveedor.show', $proveedor)}}"> <i class="fa fa-info-circle"></i>Detalles</a>
                            <a class="btn btn-success mt-1" href="{{route('proveedor.edit', $proveedor)}}">&#x270E;Editar</a>
                            @can('delete' , Auth::user())
                                <form onsubmit="return confirm('Se eliminará el siguiente registro, ¿Desea continuar?')" action="{{route('proveedor.destroy', $proveedor)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger mt-1" type="submit" value="x Eliminar">
                                </form> 
                            @endcan                     
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>