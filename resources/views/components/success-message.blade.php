<div>
    @if ($type == 'success')
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
            class="lucide lucide-circle-check"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            {{$mensaje}}
        </div>
    @endif
    @if ($type == 'warning')
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                {{$mensaje}}
            </div>
        </div>
    @endif

    @if ($type == 'login')
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                ⚠️Alerta
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p class="font-bold">Inicia sesión o crea una cuenta para continuar</p>
            </div>
        </div>
        <br>
    @endif
</div>