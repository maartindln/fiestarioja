@if($eventos->isEmpty())
    <p class="text-center text-4xl text-yellow-400 mb-5">No se encontro el evento.</p>
@else
    @foreach($eventos as $evento)
        @include('festivos.festivos', ['event' => $evento])
    @endforeach
@endif
