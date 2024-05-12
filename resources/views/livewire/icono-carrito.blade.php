<div>
    <a wire:model="items" class="nav-link" href="{{route('carrito')}}" id="carritoDropdown" role="button"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-shopping-cart fa-fw"></i>
        <!-- Counter - Items en el carrito -->
        <span class="badge badge-primary badge-counter">
            {{$items}}
        </span>
    </a>
    <button type="button" hidden id="actualizarIconoCarrito" class="btn btn-primary" wire:click="actualizarIconoCarrito">añadir</button>
</div>
