<x-cliente-layout titulo="Bienvenido"><br>
    <!DOCTYPE html>
    <html lang="en">
        <div class="container-fluid">
            <div class="row">
                @foreach ($productos as $producto)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('producto.show', $producto) }}">
                                <img class="card-img-top" src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" alt="{{ $producto->nombre }}" style="max-height: 200px;"> 
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('producto.show', $producto) }}">{{ $producto->nombre }}</a>
                                </h4>
                                <h5>${{ $producto->precio }}</h5>
                                <p class="card-text">{{ $producto->descripcion }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-success">Envío gratis <i class="fas fa-bolt"></i></small>
                                <small class="text-muted">a partir de $150 </small> 
                                <small class="text-muted">Disponibles: {{ $producto->existencia }}</small>
                                <div class="d-flex justify-content-between mt-2">
                                    <form action="#" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Agregar</button>
                                    </form>
                                    <a class="btn btn-primary btn-sm" href="{{ route('usuario.producto.show', $producto) }}"> <i class="fa fa-info-circle"></i> Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-cliente-layout>
