<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('images/logos/LOG_TEXT_AMARILLO.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin - @yield('titulo')</title>

</head>
<body class="text-gray-800 font-inter">
    <!--sidenav -->
    <div class="fixed left-0 top-0 w-64 h-full bg-green-950 p-4 z-50 sidebar-menu transition-transform">
        <a href="{{ route('index') }}" class="flex items-center pb-4 border-b border-b-green-950">
            <img class="h-8 w-auto" src="{{asset('images/logos/TXT_AMARILLO.png') }}" alt="Logo" />        </a>
        <ul class="mt-4">
            <span class="text-yellow-400 font-bold">ADMIN</span>
            <li class="mb-1 group">
                <a href="{{ route('admin') }}" class="flex font-semibold items-center py-2 px-4 text-yellow-200 hover:bg-yellow-200 hover:text-green-950 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-house mr-3 text-lg"></i>
                    <span class="text-sm">General</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-yellow-200 hover:bg-yellow-200 hover:text-green-950 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-green-950 group-[.selected]:bg-yellow-200 group-[.selected]:text-green-950 sidebar-dropdown-toggle">
                    <i class="fa-solid fa-user mr-3 text-lg"></i>
                    <span class="text-sm">Usuarios</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('allusers') }}" class="text-yellow-200 text-sm flex items-center hover:text-yellow-400 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Todos los usuarios</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('registeruser') }}" class="text-yellow-200 text-sm flex items-center hover:text-yellow-400 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Registrar usuarios</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-yellow-200 hover:bg-yellow-200 hover:text-green-950 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-green-950 group-[.selected]:bg-yellow-200 group-[.selected]:text-green-950 sidebar-dropdown-toggle">
                    <i class="fa-solid fa-map mr-3 text-lg"></i>
                    <span class="text-sm">Pueblos</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('allpueblos') }}" class="text-yellow-200 text-sm flex items-center hover:text-yellow-400 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Todos los pueblos</a>
                    </li>
                    <li class="mb-4">
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-yellow-200 hover:bg-yellow-200 hover:text-green-950 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-green-950 group-[.selected]:bg-yellow-200 group-[.selected]:text-green-950 sidebar-dropdown-toggle">
                    <i class="fa-solid fa-calendar mr-3 text-lg"></i>
                    <span class="text-sm">Eventos</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('allevents') }}" class="text-yellow-200 text-sm flex items-center hover:text-yellow-400 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Todos los eventos</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-amber-50 min-h-screen transition-all main">
        <!-- navbar -->
        <div class="py-2 px-6 bg-green-950 flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-yellow-400 font-semibold sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="ml-auto flex items-center">
                <button id="fullscreen-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-green-600 rounded-full fill-yellow-400" viewBox="0 0 24 24" style="fill: yellow-400;transform: ;msFilter:;"><path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path></svg>
                </button>
                <script>
                    const fullscreenButton = document.getElementById('fullscreen-button');

                    fullscreenButton.addEventListener('click', toggleFullscreen);

                    function toggleFullscreen() {
                        if (document.fullscreenElement) {
                            document.exitFullscreen();
                        } else {
                            document.documentElement.requestFullscreen();
                        }
                    }
                </script>

                <li class="dropdown ml-3">
                    <button type="button" class="dropdown-toggle flex items-center">
                        <div class="flex-shrink-0 w-10 h-10 relative">
                            <div class="p-1 bg-green-950 rounded-full focus:outline-none focus:ring">
                                @if (Auth::user()->avatar)
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User"/>
                                @else
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/default-profile.jpg') }}" alt="User"/>
                                @endif
                                <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                                <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="p-2 md:block text-left">
                            <h2 class="text-sm font-semibold text-yellow-400">@auth{{ Auth::user()->name }}@endAuth</h2>
                            <p class="text-xs text-yellow-200">@auth{{ Auth::user()->role }}@endAuth</p>
                        </div>
                    </button>
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="{{route('perfil') }}" class="flex items-center text-[13px] py-1.5 px-4 text-green-950 hover:text-yellow-400 hover:bg-gray-50"><i class="fa-solid fa-user mr-4"></i>Perfil</a>
                        </li>
                        <li>
                            <a href="{{ route('index') }}" role="menuitem" class="flex items-center text-[13px] py-1.5 px-4 text-green-950 hover:text-yellow-400 hover:bg-gray-50 cursor-pointer">
                                <i class="fa-solid fa-arrow-right-from-bracket mr-4"></i>Salir
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @include('alerts')
        @yield('content')
    </main>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    const sidebarToggle = document.querySelector('.sidebar-toggle')
    const sidebarOverlay = document.querySelector('.sidebar-overlay')
    const sidebarMenu = document.querySelector('.sidebar-menu')
    const main = document.querySelector('.main')
    sidebarToggle.addEventListener('click', function (e) {
        e.preventDefault()
        main.classList.toggle('active')
        sidebarOverlay.classList.toggle('hidden')
        sidebarMenu.classList.toggle('-translate-x-full')
    })
    sidebarOverlay.addEventListener('click', function (e) {
        e.preventDefault()
        main.classList.add('active')
        sidebarOverlay.classList.add('hidden')
        sidebarMenu.classList.add('-translate-x-full')
    })
    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault()
            const parent = item.closest('.group')
            if (parent.classList.contains('selected')) {
                parent.classList.remove('selected')
            } else {
                document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                    i.closest('.group').classList.remove('selected')
                })
                parent.classList.add('selected')
            }
        })
    })
    const popperInstance = {}
    document.querySelectorAll('.dropdown').forEach(function (item, index) {
        const popperId = 'popper-' + index
        const toggle = item.querySelector('.dropdown-toggle')
        const menu = item.querySelector('.dropdown-menu')
        menu.dataset.popperId = popperId
        popperInstance[popperId] = Popper.createPopper(toggle, menu, {
            modifiers: [
                {
                    name: 'offset',
                    options: {
                        offset: [0, 8],
                    },
                },
                {
                    name: 'preventOverflow',
                    options: {
                        padding: 24,
                    },
                },
            ],
            placement: 'bottom-end'
        });
    })
    document.addEventListener('click', function (e) {
        const toggle = e.target.closest('.dropdown-toggle')
        const menu = e.target.closest('.dropdown-menu')
        if (toggle) {
            const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
            const popperId = menuEl.dataset.popperId
            if (menuEl.classList.contains('hidden')) {
                hideDropdown()
                menuEl.classList.remove('hidden')
                showPopper(popperId)
            } else {
                menuEl.classList.add('hidden')
                hidePopper(popperId)
            }
        } else if (!menu) {
            hideDropdown()
        }
    })

    function hideDropdown() {
        document.querySelectorAll('.dropdown-menu').forEach(function (item) {
            item.classList.add('hidden')
        })
    }
    function showPopper(popperId) {
        popperInstance[popperId].setOptions(function (options) {
            return {
                ...options,
                modifiers: [
                    ...options.modifiers,
                    { name: 'eventListeners', enabled: true },
                ],
            }
        });
        popperInstance[popperId].update();
    }
    function hidePopper(popperId) {
        popperInstance[popperId].setOptions(function (options) {
            return {
                ...options,
                modifiers: [
                    ...options.modifiers,
                    { name: 'eventListeners', enabled: false },
                ],
            }
        });
    }
    document.querySelectorAll('[data-tab]').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault()
            const tab = item.dataset.tab
            const page = item.dataset.tabPage
            const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
            document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
                i.classList.remove('active')
            })
            document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
                i.classList.add('hidden')
            })
            item.classList.add('active')
            target.classList.remove('hidden')
        })
    })
</script>
</body>
</html>
