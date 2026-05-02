@extends('layout')
@section('titulo', 'Listado')
@section('content')
<div class="w-full h-full overflow-hidden bg-amber-50">
  <div class="sm:px-20 px-6 flex flex-col gap-4 justify-center items-center">

    <!-- Heading -->
    <div class="w-fit sm:my-20 my-10">
      <h2 class="sm:text-5xl font-bold text-green-950 pb-2">EVENTOS</h2>
      <div class="rounded-t-full border-[1px] border-gray-500 dark:border-gray-400 overflow-hidden">
        <hr class="border-[3px] border-green-400 border-green-600 w-[40%]" />
      </div>
    </div>

    <!-- Buscador -->
    <input
      type="text"
      id="buscador-eventos"
      placeholder="Buscar festivo..."
      class="w-full sm:w-1/2 px-4 py-2 border border-green-950 text-green-950 bg-amber-50 rounded mb-6 focus:outline-none focus:ring-2 focus:ring-green-500"
    />

    <!-- Lista de eventos que se actualiza -->
    <div id="lista-eventos" class="w-full flex flex-col gap-4 mb-24">
      @include('festivos.lista', ['eventos' => $events])
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#buscador-eventos').val('');
    });
  $('#buscador-eventos').on('keyup', function () {
    let search = $(this).val();

    $.ajax({
      url: "{{ route('eventos.search') }}",
      method: 'GET',
      data: { search: search },
      success: function (data) {
        $('#lista-eventos').html(data);
      },
      error: function() {
        console.error('Error en la petición AJAX.');
      }
    });
  });
</script>
@endsection
