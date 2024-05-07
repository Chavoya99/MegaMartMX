<x-admin-layout titulo="Detalles del producto">
    <a class="btn btn-primary" href="{{route('producto.index')}}">&#129044;Regresar</a>
    <a class="btn btn-success" href="{{route('producto.edit', $producto)}}">&#x270E;Editar</a><br><br>
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
        <div class="container mt-4">
            <div class="row align-items-center">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 border-right">
                                    <!-- Campos para los detalles del producto -->
                                    <div class="form-group border-bottom">
                                        <p id="nombre">Nombre: {{$producto->nombre}}</p>
                                    </div>
                                    <div class="form-group border-bottom">
                                        <p id="categoria">Categoría: {{$producto->categoria->nombre}}</p>
                                    </div>
                                    <div class="form-group border-bottom">
                                        <p id="subcategoria">Subcategoría: {{$producto->subcategoria->nombre}}</p>
                                    </div>
                                    <div class="form-group border-bottom">
                                        <p id="precio">Precio: ${{ number_format($producto->precio, 2) }}</p>
                                    </div>
                                    <div class="form-group border-bottom">
                                        <p id="codigoBarras">Código de barras: {{$producto->codigoBarras}}</p>
                                    </div>
                                    <div class="form-group border-bottom">
                                        <p id="stock">Existencia: {{$producto->existencia}}</p>
                                    </div>
                                    <div class="form-group">
                                        <p id="proveedor">Proveedor: {{$producto->proveedor->nombre}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Espacio para la imagen del producto -->
                                    <div class="text-center mb-3">
                                        @if ($producto->archivo)
                                            <img src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" class="img-fluid align-self-center" alt="{{ $producto->nombre }}">
                                        @else
                                            <img src="{{ asset('img/producto_default.png') }}" class="img-fluid align-self-center" alt="{{ $producto->nombre }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <br>
</x-admin-layout>