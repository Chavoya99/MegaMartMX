<x-admin-layout titulo="Detalles del proveedor">
    <a class="btn btn-primary" href="{{route('proveedor.index')}}">&#129044;Regresar</a>
    <a class="btn btn-success" href="{{route('proveedor.edit', $proveedor)}}">&#x270E;Editar</a><br><br>
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    <ul>
        <li><strong>Nombre:</strong> {{$proveedor->nombre}}</li>
        <li><strong>Dirección:</strong> {{$proveedor->direccion}}</li>
        <li><strong>Teléfono:</strong> {{$proveedor->telefono}}</li>
        <li><strong>Correo electrónico:</strong> {{$proveedor->correo}}</li>
        <li><strong>Estado:</strong> {{$proveedor->estado}}</li>
    </ul>  
                
</x-admin-layout>