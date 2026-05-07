@extends('admin/admin')
@section('titulo', 'Usuarios')
@section('content')
<div class="p-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <div class="text-sm text-gray-500 uppercase tracking-wide">Usuarios</div>
                <h2 class="text-2xl font-bold text-gray-900">Organiza los usuarios con los que trabajas</h2>
            </div>
            <a href="{{ route('registeruser') }}" class="bg-yellow-400 text-green-950 px-4 py-2 rounded-lg font-bold shadow-md hover:bg-yellow-300 transition">
                <i class="fa-solid fa-plus mr-2"></i>NUEVO USUARIO
            </a>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800">Registrados</h5>
                <p class="text-sm text-gray-500">Estos son los usuarios</p>
            </div>

            <div class="p-6 overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">ID</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Nombre</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Correo</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Rol</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr id="user-row-{{ $user->id }}" class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-center border">{{ $user->id }}</td>

                                <!-- Nombre -->
                                <td class="px-4 py-2 text-center border">
                                    <span class="span-data-{{ $user->id }}">{{ $user->name }}</span>
                                    <input type="text" id="edit-name-{{ $user->id }}" value="{{ $user->name }}" autocomplete="off"
                                        class="hidden input-edit-{{ $user->id }} border rounded px-2 py-1 w-full text-center">
                                </td>

                                <!-- Email -->
                                <td class="px-4 py-2 text-center border">
                                    <span class="span-data-{{ $user->id }}">{{ $user->email }}</span>
                                    <input type="email" id="edit-email-{{ $user->id }}" value="{{ $user->email }}" autocomplete="off"
                                        class="hidden input-edit-{{ $user->id }} border rounded px-2 py-1 w-full text-center">
                                </td>

                                <!-- Rol -->
                                <td class="px-4 py-2 text-center border">
                                    <span class="span-data-{{ $user->id }}">{{ $user->role }}</span>
                                    <select id="edit-role-{{ $user->id }}"
                                        class="hidden input-edit-{{ $user->id }} border rounded px-2 py-1 w-full text-center">
                                        <option value="Administrador" {{ $user->role === 'Administrador' ? 'selected' : '' }}>Administrador</option>
                                        <option value="Usuario Normal" {{ $user->role === 'Usuario Normal' ? 'selected' : '' }}>Usuario Normal</option>
                                    </select>
                                </td>

                                <!-- Acciones -->
                                <td class="px-4 py-2 text-center border">
                                    <div class="flex justify-center gap-4" id="icons-{{ $user->id }}">
                                        <button type="button" onclick="toggleEdit({{ $user->id }})" class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fa-solid fa-pen-to-square animate__animated fs-5"
                                                onmouseover="this.classList.add('animate__swing');"
                                                onanimationend="this.classList.remove('animate__swing');"></i>
                                        </button>
                                        <button type="button" onclick="confirmDelete({{ $user->id }})" class="text-red-600 hover:text-red-800 transition">
                                            <i class="fa-solid fa-trash animate__animated fs-5"
                                                onmouseover="this.classList.add('animate__swing');"
                                                onanimationend="this.classList.remove('animate__swing');"></i>
                                        </button>
                                    </div>

                                    <div id="save-actions-{{ $user->id }}" class="hidden">
                                        <div class="flex flex-col gap-1">
                                            <button type="button" onclick="saveChanges({{ $user->id }})"
                                                class="bg-green-600 text-white px-3 py-1 rounded text-xs font-bold hover:bg-green-700">
                                                GUARDAR
                                            </button>
                                            <button type="button" onclick="toggleEdit({{ $user->id }})"
                                                class="text-gray-500 text-xs underline">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>

                                    <form id="delete-form-{{ $user->id }}" action="{{ route('delete-user', $user->id) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <form id="update-form-{{ $user->id }}" action="{{ route('users.update', $user->id) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="name"  id="hidden-name-{{ $user->id }}">
                                        <input type="hidden" name="email" id="hidden-email-{{ $user->id }}">
                                        <input type="hidden" name="role"  id="hidden-role-{{ $user->id }}">
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
        document.getElementById('hidden-name-' + id).value  = document.getElementById('edit-name-' + id).value;
        document.getElementById('hidden-email-' + id).value = document.getElementById('edit-email-' + id).value;
        document.getElementById('hidden-role-' + id).value  = document.getElementById('edit-role-' + id).value;
        document.getElementById('update-form-' + id).submit();
    }

    function confirmDelete(itemId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            buttonsStyling: false,
            customClass: {
                confirmButton: 'bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded mr-2',
                cancelButton:'bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + itemId).submit();
            } else {
                Swal.fire({
                    title: 'Cancelado',
                    text: 'La acción ha sido cancelada',
                    icon: 'error',
                    confirmButtonText: 'Entendido',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded'
                    }
                });
            }
        });
    }
</script>
@endsection
