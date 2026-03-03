@extends('admin/admin')
@section('titulo', 'General')
@section('content')
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
               <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400">{{ $userCount }}</div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Usuarios registrados</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-solid fa-users text-5xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400">{{ $pueblosCount }}</div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Pueblos registrados</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-solid fa-map text-5xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400">{{ $visitCount }}</div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Visitas a la página</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-solid fa-eye text-5xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400">{{ $eventsCount }}</div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Eventos programados</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-regular fa-calendar-days text-5xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-green-950 rounded-lg shadow p-6 mb-6">
                    <div class="mb-4">
                        <h5 class="text-2xl font-bold text-yellow-400">Eventos</h5>
                        <p class="text-yellow-200">Eventos disponibles en la pagina</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-center border border-yellow-200">
                            <thead class="bg-yellow-200 text-green-950">
                                <tr class="px-4 py-2 text-green-950">
                                    <th class="py-2 border border-yellow-400">ID</th>
                                    <th class="border border-yellow-400">Pueblo</th>
                                    <th class="border border-yellow-400">Nombre</th>
                                    <th class="border border-yellow-400">Fecha inicio</th>
                                    <th class="border border-yellow-400">Fecha Fin</th>
                                    <th class="border border-yellow-400">Cartel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr class="px-4 hover:bg-yellow-100 text-green-950 bg-amber-50">
                                        <td class="py-2 border border-yellow-400">{{ $event->id }}</td>
                                        <td class="border border-yellow-400">{{ $event->pueblo->name }}</td>
                                        <td class="border border-yellow-400">{{ $event->name }}</td>
                                        <td class="border border-yellow-400">{{ $event->dateIni }}</td>
                                        <td class="border border-yellow-400">{{ $event->dateFin }}</td>
                                        <td class="border border-yellow-400">
                                            <a href="{{ asset('storage/carteles/' . $event->cartel) }}" target="_blank" class="text-blue-600 underline">
                                                {{ $event->cartel }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- Lista pueblos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Centros -->
                <div class="bg-green-950 rounded-lg shadow p-6">
                    <div class="mb-4">
                        <h5 class="text-2xl font-bold text-yellow-400">Pueblos</h5>
                        <p class="text-yellow-200">Pueblos registrados en la página</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-center border border-yellow-200">
                            <thead class="bg-yellow-200 text-green-950">
                                <tr class="px-4 py-2 text-green-950">
                                    <th class="py-2 border border-yellow-400">ID</th>
                                    <th class="border border-yellow-400">Nombre</th>
                                    <th class="border border-yellow-400">Latitud</th>
                                    <th class="border border-yellow-400">Longitud</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pueblos as $pueblo)
                                    <tr class="px-4 hover:bg-yellow-100 text-green-950 bg-amber-50">
                                        <td class="py-2 border border-yellow-400">{{ $pueblo->id }}</td>
                                        <td class="border border-yellow-400">{{ $pueblo->name }}</td>
                                        <td class="border border-yellow-400">{{ $pueblo->latitude }}</td>
                                        <td class="border border-yellow-400">{{ $pueblo->longitude }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Usuarios -->
                <div class="bg-green-950 rounded-lg shadow p-6">
                    <div class="mb-4">
                        <h5 class="text-2xl font-bold text-yellow-400">Usuarios</h5>
                        <p class="text-yellow-200">Usuarios registrados en la página</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-center border border-gray-200">
                            <thead class="bg-yellow-200 text-green-950">
                                <tr class="px-4 py-2 text-green-950">
                                    <th class="py-2 border border-yellow-400">ID</th>
                                    <th class="border border-yellow-400">Nombre</th>
                                    <th class="border border-yellow-400">Correo</th>
                                    <th class="border border-yellow-400">Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="px-4 hover:bg-yellow-100 text-green-950 bg-amber-50">
                                        <td class="py-2 px-3 border border-yellow-400">{{ $user->id }}</td>
                                        <td class="border border-yellow-400">{{ $user->name }}</td>
                                        <td class="border border-yellow-400">{{ $user->email }}</td>
                                        <td class="border border-yellow-400">{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
