@if($pueblos->isEmpty())
    <p class="text-center text-4xl text-yellow-400 mb-5">No se encontro el pueblo.</p>
@else
    @foreach($pueblos as $pueblo)
        @include('pueblos.pueblos', ['pueblo' => $pueblo])
    @endforeach
@endif
