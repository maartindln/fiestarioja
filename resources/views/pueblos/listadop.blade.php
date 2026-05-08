@extends('layout')
@section('titulo', 'Listado')
@section('content')

<div class="w-full min-h-screen bg-green-950">
    {{-- LA FRANJA AMARILLA --}}
    <div class="h-20 bg-yellow-400 shadow-md flex items-center px-4 md:px-8 mb-10">
        <div class="max-w-7xl w-full mx-auto flex items-center justify-between">
            <span class="font-black text-green-950 text-lg md:text-xl tracking-widest uppercase">
                Explora los pueblos
            </span>
            <div class="bg-green-950 text-amber-50 px-4 py-1.5 rounded-full text-xs font-bold uppercase">
                {{ count($pueblos) }} PUEBLOS TOTALES
            </div>
        </div>
    </div>

    <div class="sm:px-20 px-6 flex flex-col items-center">
        
        {{-- BUSCADOR CON LUPITA --}}
        <div class="w-full sm:w-1/2 mb-12">
            <div class="relative flex items-center">
                <input
                    type="text"
                    id="buscador-pueblos"
                    placeholder="Buscar pueblo..."
                    class="w-full px-5 py-3 pr-12 border-2 border-yellow-400/20 text-green-950 bg-white rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-sm"
                />
                {{-- La lupita con pointer-events-none para que el clic la atraviese --}}
                <div class="absolute right-4 text-green-950/40 pointer-events-none">
                    <i class="fa fa-search text-lg"></i>
                </div>
            </div>
        </div>

        {{-- LISTA DE PUEBLOS --}}
        <div id="lista-pueblos" class="w-full flex flex-col gap-6 mb-24 max-w-7xl">
            @include('pueblos.lista', ['pueblos' => $pueblos])
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Limpiar buscador al cargar
        $('#buscador-pueblos').val('');

        // Búsqueda AJAX
        $('#buscador-pueblos').on('keyup', function () {
            let search = $(this).val();

            $.ajax({
                url: "{{ route('pueblos.search') }}",
                method: 'GET',
                data: { search: search },
                success: function (data) {
                    $('#lista-pueblos').html(data);
                },
                error: function() {
                    console.error('Error en la búsqueda de pueblos.');
                }
            });
        });
    });
</script>

@endsection