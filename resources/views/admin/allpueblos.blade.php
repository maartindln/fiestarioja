@extends('admin/admin')
@section('titulo', 'Gestión de Pueblos')

@section('content')
<div class="p-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <div class="text-sm text-gray-500 uppercase tracking-wide">Pueblos</div>
                <h2 class="text-2xl font-bold text-gray-900">Organiza los pueblos con los que trabajas</h2>
            </div>
            <a href="{{ route('admin.registrarpueblo') }}" class="bg-yellow-400 text-green-950 px-4 py-2 rounded-lg font-bold shadow-md hover:bg-yellow-300 transition">
                <i class="fa-solid fa-plus mr-2"></i>NUEVO PUEBLO
            </a>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800">Registrados</h5>
            </div>

            <div class="p-6 overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-gray-700 font-semibold border">ID</th>
                            <th class="px-4 py-2 text-gray-700 font-semibold border">Nombre</th>
                            <th class="px-4 py-2 text-gray-700 font-semibold border">Latitud</th>
                            <th class="px-4 py-2 text-gray-700 font-semibold border">Longitud</th>
                            <th class="px-4 py-2 text-gray-700 font-semibold border">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pueblos as $pueblo)
                            <tr id="pueblo-row-{{ $pueblo->id }}" class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-center border">{{ $pueblo->id }}</td>
                                
                                <!-- Nombre -->
                                <td class="px-4 py-2 text-center border">
                                    <span class="span-data-{{ $pueblo->id }}">{{ $pueblo->name }}</span>
                                    <input type="text" id="edit-name-{{ $pueblo->id }}" value="{{ $pueblo->name }}" 
                                        class="hidden input-edit-{{ $pueblo->id }} border rounded px-2 py-1 w-full text-center">
                                </td>

                                <!-- Latitud -->
                                <td class="px-4 py-2 text-center border">
                                    <span class="span-data-{{ $pueblo->id }}">{{ $pueblo->latitude }}</span>
                                    <input type="text" id="edit-lat-{{ $pueblo->id }}" value="{{ $pueblo->latitude }}" 
                                        class="hidden input-edit-{{ $pueblo->id }} border rounded px-2 py-1 w-full text-center">
                                </td>

                                <!-- Longitud -->
                                <td class="px-4 py-2 text-center border">
                                    <span class="span-data-{{ $pueblo->id }}">{{ $pueblo->longitude }}</span>
                                    <input type="text" id="edit-lng-{{ $pueblo->id }}" value="{{ $pueblo->longitude }}" 
                                        class="hidden input-edit-{{ $pueblo->id }} border rounded px-2 py-1 w-full text-center">
                                </td>

                                <td class="px-4 py-2 text-center border">
                                    <div class="flex justify-center gap-4" id="icons-{{ $pueblo->id }}">
                                        <button onclick="toggleEdit({{ $pueblo->id }})" class="text-blue-600">
                                            <i class="fa-solid fa-pen-to-square text-xl"></i>
                                        </button>
                                        <button onclick="confirmDelete({{ $pueblo->id }})" class="text-red-600">
                                            <i class="fa-solid fa-trash text-xl"></i>
                                        </button>
                                    </div>

                                    <div id="save-actions-{{ $pueblo->id }}" class="hidden flex flex-col gap-1">
                                        <button onclick="saveChanges({{ $pueblo->id }})" class="bg-green-600 text-white px-3 py-1 rounded text-xs font-bold">GUARDAR</button>
                                        <button onclick="toggleEdit({{ $pueblo->id }})" class="text-gray-500 text-xs underline">Cancelar</button>
                                    </div>

                                    <form id="delete-form-{{ $pueblo->id }}" action="{{ route('delete-pueblo', $pueblo->id) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>

                                    <form id="update-form-{{ $pueblo->id }}" action="{{ route('pueblos.update', $pueblo->id) }}" method="POST" class="hidden">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="name" id="hidden-name-{{ $pueblo->id }}">
                                        <input type="hidden" name="latitude" id="hidden-lat-{{ $pueblo->id }}">
                                        <input type="hidden" name="longitude" id="hidden-lng-{{ $pueblo->id }}">
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
    function toggleEdit(id) {
        const spans = document.querySelectorAll('.span-data-' + id);
        const inputs = document.querySelectorAll('.input-edit-' + id);
        const icons = document.getElementById('icons-' + id);
        const save = document.getElementById('save-actions-' + id);

        const isEditing = icons.classList.contains('hidden');

        if(!isEditing) {
            spans.forEach(s => s.classList.add('hidden'));
            inputs.forEach(i => i.classList.remove('hidden'));
            icons.classList.add('hidden');
            save.classList.remove('hidden');
        } else {
            spans.forEach(s => s.classList.remove('hidden'));
            inputs.forEach(i => i.classList.add('hidden'));
            icons.classList.remove('hidden');
            save.classList.add('hidden');
        }
    }

    function saveChanges(id) {
        document.getElementById('hidden-name-' + id).value = document.getElementById('edit-name-' + id).value;
        document.getElementById('hidden-lat-' + id).value = document.getElementById('edit-lat-' + id).value;
        document.getElementById('hidden-lng-' + id).value = document.getElementById('edit-lng-' + id).value;
        document.getElementById('update-form-' + id).submit();
    }

    function confirmDelete(id) {
        Swal.fire({
            title: '¿Eliminar pueblo?',
            text: "Se borrarán también sus eventos asociados",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection