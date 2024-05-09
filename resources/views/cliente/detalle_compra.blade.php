<x-cliente-layout titulo="Detalles de compra {{$compra->id}}">
    
    <a class="btn btn-primary" href="{{route('cliente.mis_compras')}}">&#129044;Regresar</a><br><br>
    <h3>Subtotal: {{$compra->subtotal}} <br>  Envío: {{$compra->envio}} <br> Total: {{$compra->total}}</h3>
    <div class="table-responsive">    
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>subtotal</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($productos as  $producto)
                    <tr>
                        <td>{{$producto->pivot->nombre_producto}}</td>
                        <td>{{$producto->pivot->cantidad}}</td>
                        <td>{{$producto->pivot->precio_unitario}}</td>
                        <td>{{$producto->pivot->subtotal}}</td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</x-cliente-layout>