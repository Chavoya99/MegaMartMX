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
                                            <a class="btn btn-info" href="{{route('archivo.download', $producto->archivo) }}">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                    class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                    <polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                                </i>
                                                Descargar imagen
                                            </a>
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