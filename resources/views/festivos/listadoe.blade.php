@extends('layout')
@section('titulo', 'Listado')
@section('content')

<div class="w-full min-h-screen bg-green-950"> 

    {{-- LA FRANJA AMARILLA --}}
    <div class="h-20 bg-yellow-400 shadow-md flex items-center px-4 md:px-8 mb-10">
        <div class="max-w-7xl w-full mx-auto flex items-center justify-between">
            <span class="font-black text-green-950 text-lg md:text-xl tracking-widest uppercase">
                Explora los eventos
            </span>
            {{-- Puedes poner aquí un contador de eventos o dejarlo como separador visual --}}
            <div class="bg-green-950 text-amber-50 px-4 py-1.5 rounded-full text-xs font-bold uppercase">
                {{ count($events) }} EVENTOS TOTALES
            </div>
        </div>
    </div>

    <div class="sm:px-20 px-6 flex flex-col items-center">
        {{-- BUSCADOR --}}
        <div class="w-full sm:w-1/2 mb-12">
            <div class="relative flex items-center">
                <input
                    type="text"
                    id="buscador-eventos"
                    placeholder="Buscar festivo..."
                    class="w-full px-5 py-3 pr-12 border-2 border-yellow-400/20 text-green-950 bg-white rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm"
                />
                <div class="absolute right-4 text-green-950/40">
                    <i class="fa fa-search text-lg"></i>
                </div>
            </div>
        </div>

        {{-- LISTA DE EVENTOS --}}
        <div id="lista-eventos" class="w-full flex flex-col gap-6 mb-24 max-w-7xl">
            @include('festivos.lista', ['eventos' => $events])
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#buscador-eventos').val('');
        $('#buscador-eventos').on('keyup', function () {
            let search = $(this).val();
            $.ajax({
                url: "{{ route('eventos.search') }}",
                method: 'GET',
                data: { search: search },
                success: function (data) {
                    $('#lista-eventos').html(data);
                }
            });
        });
    });
</script>

@endsection