<x-cliente-layout titulo="{{ $producto->nombre }}">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('cliente.homeIndex')}}"> &#129044; Regresar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($producto->archivo)
                                    <img src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" class="img-fluid" alt="{{ $producto->nombre }}">
                                @else
                                    <img src="{{ asset('img/producto_default.png') }}" class="img-fluid" alt="{{ $producto->nombre }}">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</li>
                                    <li class="list-group-item"><strong>Subcategoría:</strong> {{ $producto->subcategoria->nombre }}</li>
                                    <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</li>
                                    <li class="list-group-item">
                                        <strong>Descripción:</strong>
                                        <span class="text-success"> Envío gratis <i class="fas fa-bolt"></i></span> 
                                        Para toda la república mexicana a partir de $150 en tu carrito o $50 en envío. 
                                        Envío al día siguiente a la puerta de tu casa. 
                                        Solo pago en efectivo. 
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 1px solid #dee2e6;">
                                        <span style="flex-grow: 1;">Disponibilidad: {{ $producto->existencia }}</span>
                                        <div style="flex-grow: 1; text-align: right;">
                                            <form action="{{ route('carrito.agregar', ['id' => $producto->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success mr-2"><i class="fas fa-plus"></i> Agregar al carrito</button>
                                            </form>
                                            @if ($producto->favoritos()->where('user_id', Auth::id())->exists())
                                                <button class="btn btn-danger" disabled><i class="fas fa-heart"></i> Guardar para más tarde</button>
                                            @else
                                                <form action="{{route('cliente.nuevo_favorito', $producto)}}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-heart"></i> Guardar para más tarde</button>

                                                </form>
                                            @endif
                                            
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-cliente-layout>

