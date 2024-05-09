<x-cliente-layout titulo="Confirmar compra">
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Resumen del Pedido</h5>
                <hr>
                @php
                    $subtotal = 0;
                    $totalProductos = 0; // Variable para contar el total de productos
                    if(session('carrito')) {
                        foreach(session('carrito') as $id => $item) {
                            $subtotal += $item['producto']->precio * $item['cantidad'];
                            $totalProductos += $item['cantidad']; // Suma la cantidad de cada producto
                        }
                        if ($subtotal < 150) {
                            $total = $subtotal + 50; // Suma $50 si el subtotal es menor a $150
                        }else{
                            $total = $subtotal;
                        }
                        
                    }
                @endphp
                @if ($subtotal >= 150)
                    <p style="color: green;">Tu pedido califica para envío GRATIS</p>
                @else
                    <p style="color: grey;">Envío: $50</p>
                @endif
                <p>Subtotal ({{ $totalProductos }} productos): <br><strong style="font-size: 30px;">${{ number_format($subtotal, 2) }}</strong></p>
                <p>Total: <br><strong style="font-size: 30px;">${{ number_format($total, 2) }}</strong></p>
            </div>
        </div>
        <br>
        <form action="{{route('carrito.comprar', [$subtotal,$total])}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-badge-dollar-sign"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/>
            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
            
            Confirmar compra</button>
        </form>
    
    
</x-cliente-layout>