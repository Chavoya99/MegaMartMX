<x-cliente-layout titulo="Detalles de compra {{ $compra->id }}">
        <a class="btn btn-primary" href="{{ route('cliente.mis_compras') }}">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    <div class="container mt-4">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Detalles de la compra</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <h5 class="card-title mb-0">Resumen del pedido</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Subtotal:</span>
                                        <span class="badge bg-primary badge-pill font-weight-bold font-size-lg text-white">${{ $compra->subtotal }}</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Envío:</span>
                                        <span class="badge badge-success badge-pill font-weight-bold font-size-lg text-white">${{ $compra->envio }}</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Total:</span>
                                        <span class="badge badge-warning badge-pill font-weight-bold font-size-lg text-dark">${{ $compra->total }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title mb-4">Productos</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr class="bg-warning text-dark">
                                                <th>Producto</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Precio unitario</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        @if ($producto->archivo)
                                                            <img src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" alt="{{ $producto->nombre }}" class="img-fluid mx-auto" style="max-height: 50px;">
                                                        @else
                                                            <img src="ruta/a/imagen/por/defecto.jpg" alt="{{ $producto->nombre }}" class="img-fluid mx-auto" style="max-height: 50px;">
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">{{ $producto->pivot->nombre_producto }}</td>
                                                    <td class="align-middle">{{ $producto->pivot->cantidad }}</td>
                                                    <td class="align-middle">${{ $producto->pivot->precio_unitario }}</td>
                                                    <td class="align-middle">${{ $producto->pivot->subtotal }}</td>
                                                </tr> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-cliente-layout>
