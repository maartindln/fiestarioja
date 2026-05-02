@if($eventos->isEmpty())
    <p class="text-center text-4xl text-green-950 mb-5">No se encontro el evento.</p>
@else
    @foreach($eventos as $evento)
        @include('festivos.festivos', ['event' => $evento])
    @endforeach
@endif
