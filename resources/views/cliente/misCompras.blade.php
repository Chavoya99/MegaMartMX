<x-cliente-layout titulo="Mis compras">
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    
    <a class="btn btn-primary" href="{{route('cliente.homeIndex')}}">&#129044;Regresar</a><br><br>
    <div class="table-responsive">    
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID compra</th>
                    <th>Subtotal</th>
                    <th>Envío</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as  $compra)
                    <tr>
                        <td>{{$compra->id}}</td>
                        <td>{{$compra->subtotal}}</td>
                        <td>{{$compra->envio}}</td>
                        <td>{{$compra->total}}</td>
                        <td>{{date('d-m-Y H:i:s', strtotime($compra->fecha))}}</td>
                        <td>
                            <a class="btn btn-primary mt-1" href="{{route('cliente.detalle_compra', $compra)}}"> <i class="fa fa-info-circle"></i>Detalles</a>       
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</x-cliente-layout>