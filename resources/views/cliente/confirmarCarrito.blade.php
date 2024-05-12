<x-cliente-layout titulo="Confirmar compra">
    <a class="btn btn-primary" href="{{ URL::previous() }}"> &#129044; Regresar</a><br><br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resumen del Pedido</h5>
                    <hr>
                    @php
                        $subtotal = 0;
                        $total = 0;
                        $envio = 50;
                        $totalProductos = 0;
                        if(session('carrito')) {
                            foreach(session('carrito') as $id => $item) {
                                $subtotal += $item['producto']->precio * $item['cantidad'];
                                $totalProductos += $item['cantidad']; 
                            }
                            if ($subtotal < 150) {
                                $total = $subtotal + $envio; 
                            } else {
                                $total = $subtotal;
                                $envio = 0;
                            }
                        }
                    @endphp
                    @if ($subtotal >= 150)
                        <p style="color: green;">Tu pedido califica para envío GRATIS</p>
                    @else
                        <p style="color: grey;">Envío: $50</p>
                    @endif
                    <p>Subtotal ({{ $totalProductos }} productos): <br><strong style="font-size: 32px;">${{ number_format($subtotal, 2) }}</strong></p>
                    <p>Total: <br><strong style="font-size: 32px;">${{ number_format($total, 2) }}</strong></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <span id="toggle-products" style="cursor: pointer;">
                            Productos
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather" style="float: right;">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    </h5>
                    <div id="products-section" style="display: none;">
                        @if(session('carrito') && count(session('carrito')) > 0)
                            @foreach(session('carrito') as $id => $item)
                                <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                                    <div style="display: flex; align-items: center;">
                                    @if($item['producto']->archivo)
                                        <img src="{{ asset(\Storage::url($item['producto']->archivo->ubicacion)) }}" alt="{{ $item['producto']->nombre }}" style="max-width: 100px; margin-right: 20px;">
                                    @else
                                        <img src="{{asset('img/producto_default.png')}}" alt="{{ $item['producto']->nombre }}" style="max-width: 100px; margin-right: 20px;"> 
                                    @endif
                                    <div>
                                            <h3>{{ $item['producto']->nombre }}</h3>
                                            <p>Precio: ${{ number_format($item['producto']->precio, 2) }}</p>
                                            <span>Cantidad: {{ $item['cantidad'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No hay productos en el carrito.</p>
                        @endif
                    </div>
                    
                    <hr>
                    <h5 class="card-title">Detalles de entrega
                        <span id="toggle-details" style="cursor: pointer; float: right;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </span>
                    </h5>
                    <hr>
                    <form action="{{ route('carrito.comprar', [$subtotal, $total, $envio]) }}" method="POST" id="form-detalles-entrega">
                        @csrf
                        <div id="details-section" style="display: none;">
                            <div class="mb-3">
                                <label for="calle" class="form-label">Calle:</label>
                                <input type="text" class="form-control" id="calle" name="calle" placeholder="Ingresa el nombre de la calle">
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="numero" class="form-label">Número:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="codigo_postal" class="form-label">C.P:</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Código Postal">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="colonia" class="form-label">Colonia:</label>
                                    <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ciudad" class="form-label">Ciudad:</label>
                                    <select class="form-select" id="ciudad" name="ciudad">
                                        <option value="">Selecciona una ciudad</option>
                                        <option value="Ciudad de México">CDMX</option>
                                        <option value="Guadalajara">Guadalajara</option>
                                        <option value="Monterrey">Monterrey</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Mérida">Mérida</option>
                                        <option value="Cancún">Cancún</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="estado" class="form-label">Estado:</label>
                                    <select class="form-select" id="estado" name="estado">
                                        <option value="">Selecciona un estado</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="México">México</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="mb-2 offset-md-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pago_efectivo" value="1" id="pagoEfectivo" checked>
                                <label class="form-check-label" for="pagoEfectivo">
                                    Pago: efectivo
                                </label>
                            </div>
                        </div>
                        <div class="mb-2 offset-md-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pago_efectivo" value="1" id="pagoEfectivo" checked>
                                <label class="form-check-label" for="pagoEfectivo">
                                    Descargar recibo de compra
                                </label>
                            </div>
                        </div>
                        <div class="mb-2 offset-md-0">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="confirmarEnvioCorreo" id="confirmarEnvioCorreo" checked>
                                <label class="form-check-label" for="confirmarEnvioCorreo">Enviar mi recibo de compra por correo electrónico</label>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-warning text-dark mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-dollar-sign">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/>
                                <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/>
                                <path d="M12 18V6"/>
                            </svg>
                            Confirmar compra
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleProducts = document.getElementById('toggle-products');
                const productsSection = document.getElementById('products-section');
        
                toggleProducts.addEventListener('click', function() {
                    if (productsSection.style.display === 'none') {
                        productsSection.style.display = 'block';
                        toggleProducts.innerHTML = 'Productos <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather" style="float: right;"><polyline points="6 9 12 15 18 9"></polyline></svg>';
                    } else {
                        productsSection.style.display = 'none';
                        toggleProducts.innerHTML = 'Productos <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather" style="float: right;"><polyline points="6 9 12 15 18 9"></polyline></svg>';
                    }
                });
        
                const toggleDetails = document.getElementById('toggle-details');
                const detailsSection = document.getElementById('details-section');
        
                toggleDetails.addEventListener('click', function() {
                    if (detailsSection.style.display === 'none') {
                        detailsSection.style.display = 'block';
                        toggleDetails.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg>';
                    } else {
                        detailsSection.style.display = 'none';
                        toggleDetails.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>';
                    }
                });
            });

            $(document).ready(function(){
                $('input, select').each(function() {
                    $(this).change(function(){
                        if($(this).val() !== '') {
                            $(this).addClass('is-valid');
                        } else {
                            $(this).removeClass('is-valid');
                        }
                    });
                });
            });
        </script>
    </div>
</x-cliente-layout>
