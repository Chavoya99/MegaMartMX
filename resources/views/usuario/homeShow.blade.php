<x-cliente-layout titulo="Detalles del producto">
    <div class="d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="{{ route('homeIndex') }}"> &#129044; Regresar</a>
        <div class="text-right"> 
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm-1"><i class="fas fa-plus"></i> Agregar</button>
            </form>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-12 offset-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 border-right"> 
                                <div class="form-group border-bottom">
                                    <p id="nombre">Nombre: {{ $producto->nombre }}</p>
                                </div>
                                <div class="form-group border-bottom">
                                    <p id="categoria">Categoría: {{ $producto->categoria->nombre }}</p>
                                </div>
                                <div class="form-group border-bottom">
                                    <p id="subcategoria">Subcategoría: {{$producto->subcategoria->nombre}}</p>
                                </div>
                                <div class="form-group border-bottom">
                                    <p id="precio">Precio: ${{ number_format($producto->precio, 2) }}</p>
                                </div>
                                <div class="form-group">
                                    <p id="descripcion">Descripción:<br><text class="text-success">Envío gratis <i class="fas fa-bolt"></i></text>
                                        a toda la república mexicana a partir de $150 en tu carrito o $50 en envío. 
                                        Envío al día siguiente a la puerta de tu casa. 
                                        Solo pago en efectivo. {{ $producto->descripcion }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
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
</x-cliente-layout>
