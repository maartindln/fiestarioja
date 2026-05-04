@extends('admin/admin')
@section('titulo', 'Eventos')
@section('content')
<div class="p-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <div class="text-sm text-gray-500 uppercase tracking-wide">Eventos</div>
                <h2 class="text-2xl font-bold text-gray-900">Organiza los eventos que hay programados</h2>
            </div>
            <a href="{{ route('admin.registrarevento') }}" class="bg-yellow-400 text-green-950 px-4 py-2 rounded-lg font-bold shadow-md hover:bg-yellow-300 transition">
                <i class="fa-solid fa-plus mr-2"></i>NUEVO EVENTO
            </a>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800">Registrados</h5>
                <p class="text-sm text-gray-500">Estos son los eventos</p>
            </div>

            <div class="p-6 overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">ID</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Pueblo</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Nombre</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Fecha inicio</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Fecha fin</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Cartel</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr id="event-row-{{ $event->id }}" class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-center border">{{ $event->id }}</td>
                                
                                <!-- Pueblo -->
                                <td class="px-4 py-2 text-center border" id="event-pueblo-{{ $event->id }}">
                                    <span>{{ $event->pueblo->name }}</span>
                                    <select id="edit-pueblo-{{ $event->id }}" class="hidden w-full border rounded px-1 py-1 text-sm">
                                        @foreach($pueblos as $pueblo)
                                            <option value="{{ $pueblo->id }}" {{ $event->pueblo_id == $pueblo->id ? 'selected' : '' }}>
                                                {{ $pueblo->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <!-- Nombre -->
                                <td class="px-4 py-2 text-center border" id="event-name-{{ $event->id }}">
                                    <span>{{ $event->name }}</span>
                                    <input type="text" id="edit-name-{{ $event->id }}" value="{{ $event->name }}" 
                                        class="hidden w-full border rounded px-1 py-1 text-sm text-center">
                                </td>

                                <!-- Fecha Inicio -->
                                <td class="px-4 py-2 text-center border" id="event-dateIni-{{ $event->id }}">
                                    <span>{{ $event->dateIni }}</span>
                                    <input type="date" id="edit-dateIni-{{ $event->id }}" value="{{ $event->dateIni }}" 
                                        class="hidden w-full border rounded px-1 py-1 text-sm text-center">
                                </td>

                                <!-- Fecha Fin -->
                                <td class="px-4 py-2 text-center border" id="event-dateFin-{{ $event->id }}">
                                    <span>{{ $event->dateFin }}</span>
                                    <input type="date" id="edit-dateFin-{{ $event->id }}" value="{{ $event->dateFin }}" 
                                        class="hidden w-full border rounded px-1 py-1 text-sm text-center">
                                </td>

                                <!-- Cartel -->
                                <td class="px-4 py-2 text-center border">
                                    <a href="{{ asset('storage/carteles/' . $event->cartel) }}" target="_blank" class="text-blue-600 underline text-xs">
                                        {{ Str::limit($event->cartel, 15) }}
                                    </a>
                                </td>

                                <td class="px-4 py-2 text-center border">
                                    <div class="flex justify-center gap-4" id="icons-{{ $event->id }}">
                                        <button onclick="toggleEditFields({{ $event->id }})" class="text-blue-600 hover:text-blue-800">
                                            <i class="fa-solid fa-pen-to-square fs-5"></i>
                                        </button>
                                        <button onclick="confirmDelete({{ $event->id }})" class="text-red-600 hover:text-red-800">
                                            <i class="fa-solid fa-trash fs-5"></i>
                                        </button>
                                    </div>

                                    <!-- Botones de Guardar/Cancelar -->
                                    <div id="save-actions-{{ $event->id }}" class="hidden flex flex-col gap-1 items-center">
                                        <button class="px-3 py-1 bg-green-600 text-white rounded text-xs hover:bg-green-700 w-full"
                                            onclick="saveChanges({{ $event->id }})">Guardar</button>
                                        <button class="text-xs text-gray-500 hover:underline" 
                                            onclick="toggleEditFields({{ $event->id }})">Cancelar</button>
                                    </div>

                                    <!-- Formulario para Eliminar -->
                                    <form id="delete-form-{{ $event->id }}" action="{{ route('delete-event', $event->id) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>

                                    <!-- Formulario oculto para Update -->
                                    <form id="update-form-{{ $event->id }}" action="{{ route('events.update', $event->id) }}" method="POST" class="hidden">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="name" id="hidden-name-{{ $event->id }}">
                                        <input type="hidden" name="pueblo_id" id="hidden-pueblo-{{ $event->id }}">
                                        <input type="hidden" name="dateIni" id="hidden-dateIni-{{ $event->id }}">
                                        <input type="hidden" name="dateFin" id="hidden-dateFin-{{ $event->id }}">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleEditFields(id) {
        const row = document.getElementById('event-row-' + id);
        const spans = row.querySelectorAll('span');
        const inputs = row.querySelectorAll('input, select');
        const iconsDiv = document.getElementById('icons-' + id);
        const saveActions = document.getElementById('save-actions-' + id);

        const isEditing = iconsDiv.classList.contains('hidden');

        if (!isEditing) {
            // Entrar en modo edición
            spans.forEach(s => s.classList.add('hidden'));
            inputs.forEach(i => i.classList.remove('hidden'));
            iconsDiv.classList.add('hidden');
            saveActions.classList.remove('hidden');
        } else {
            // Salir de modo edición
            spans.forEach(s => s.classList.remove('hidden'));
            inputs.forEach(i => i.classList.add('hidden'));
            iconsDiv.classList.remove('hidden');
            saveActions.classList.add('hidden');
        }
    }

    function saveChanges(id) {
        // Mapear valores de los inputs a los campos ocultos del form
        document.getElementById('hidden-name-' + id).value = document.getElementById('edit-name-' + id).value;
        document.getElementById('hidden-pueblo-' + id).value = document.getElementById('edit-pueblo-' + id).value;
        document.getElementById('hidden-dateIni-' + id).value = document.getElementById('edit-dateIni-' + id).value;
        document.getElementById('hidden-dateFin-' + id).value = document.getElementById('edit-dateFin-' + id).value;

        document.getElementById('update-form-' + id).submit();
    }

    function confirmDelete(id) {
        Swal.fire({
            title: '¿Eliminar evento?',
            text: "Se borrará permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, borrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection