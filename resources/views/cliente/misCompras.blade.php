<x-cliente-layout titulo="Mis compras">
    <a class="btn btn-primary mb-3" href="{{ route('cliente.homeIndex') }}">
        <i class="fas fa-arrow-left mr-2"></i> Regresar
    </a>
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr class="bg-warning text-dark">
                                <th>ID de compra</th>
                                <th>Subtotal</th>
                                <th>Envío</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ $compra->id }}</td>
                                    <td>${{ $compra->subtotal }}</td>
                                    <td>${{ $compra->envio }}</td>
                                    <td>${{ $compra->total }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($compra->fecha)) }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('cliente.detalle_compra', $compra) }}">
                                            <i class="fas fa-info-circle mr-1"></i> Detalles
                                        </a>       
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-cliente-layout>

