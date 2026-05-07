@extends('layout')
@section('titulo', 'Calendario')
@section('content')

@php
    $email = auth()->user()->email ?? null;
    $isAdmin = $email ? DB::table('users')->where('email', $email)->where('role', 'Administrador')->exists() : false;
@endphp

<header class="top-0 left-0 right-0 z-50 h-20 bg-yellow-400 shadow-md flex items-center px-4 md:px-8">
    <div class="max-w-7xl w-full mx-auto flex items-center justify-between gap-4">

        <div class="flex items-center gap-2 min-w-0">
            <button id="btn-prev"
                class="w-9 h-9 rounded-full bg-green-950 text-amber-50 flex items-center justify-center hover:bg-green-800 transition shrink-0">
                <i class="fa fa-angle-left"></i>
            </button>
            <span id="header-month" class="font-bold text-green-950 text-sm md:text-base w-28 text-center tracking-widest uppercase truncate"></span>
            <button id="btn-next"
                class="w-9 h-9 rounded-full bg-green-950 text-amber-50 flex items-center justify-center hover:bg-green-800 transition shrink-0">
                <i class="fa fa-angle-right"></i>
            </button>
        </div>

        {{-- Año --}}
        <span id="header-year" class="font-black text-green-950 text-lg md:text-xl tracking-widest hidden sm:block"></span>

        {{-- Botón hoy --}}
        <button id="btn-today"
            class="bg-green-950 text-amber-50 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-green-800 transition shrink-0">
            HOY
        </button>
    </div>
</header>

{{-- ========== LAYOUT PRINCIPAL ========== --}}
<div class="py-16 min-h-screen bg-green-950">
    <div class="max-w-7xl mx-auto p-4 flex flex-col lg:flex-row gap-4">

        {{-- ========== SIDEBAR ========== --}}
        <aside class="w-full lg:w-72 shrink-0 bg-amber-50 rounded-2xl shadow-lg p-5 flex flex-col gap-4 order-2 lg:order-1">

            {{-- Día seleccionado --}}
            <div class="text-center border-b border-green-950 pb-4">
                <p id="aside-day" class="text-5xl font-black text-green-950 leading-none">--</p>
                <p id="aside-month" class="text-sm font-semibold text-green-950 uppercase tracking-widest mt-1"></p>
            </div>

            {{-- Botón añadir (solo admin) --}}
            @if ($isAdmin)
            <button id="btn-add-event"
                class="w-full bg-green-950 text-amber-50 rounded-full py-2 text-xs font-bold uppercase tracking-widest hover:bg-green-800 transition flex items-center justify-center gap-2">
                <i class="fa fa-plus"></i> Añadir evento
            </button>
            @endif

            {{-- Lista de eventos --}}
            <div id="event-list" class="flex flex-col gap-2 overflow-y-auto max-h-72 lg:max-h-[calc(100vh-320px)]">
                <p class="text-green-950 text-xs text-center mt-4">Selecciona un día para ver los eventos</p>
            </div>
        </aside>

        {{-- ========== CALENDARIO ========== --}}
        <main class="flex-1 bg-amber-50 rounded-2xl shadow-lg p-4 overflow-hidden order-1 lg:order-2">

            {{-- Cabecera días de la semana --}}
            <div class="grid grid-cols-7 mb-2">
                @foreach(['L','M','X','J','V','S','D'] as $d)
                    <div class="text-center text-xs font-bold text-green-950/50 uppercase tracking-widest py-2">{{ $d }}</div>
                @endforeach
            </div>

            {{-- Grid de días (generado por JS) --}}
            <div id="cal-grid" class="grid grid-cols-7 gap-1"></div>
        </main>
    </div>
</div>

{{-- ========== MODAL AÑADIR EVENTO ========== --}}
@if ($isAdmin)
<div id="modal-event"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-green-950/60 backdrop-blur-sm hidden">
    <div class="bg-amber-50 rounded-2xl shadow-2xl w-full max-w-md p-6 relative">

        <button id="btn-close-modal"
            class="absolute top-4 right-4 text-green-950/40 hover:text-red-700 transition text-lg">
            <i class="fa fa-times"></i>
        </button>

        <h2 class="text-lg font-black text-green-950 uppercase tracking-widest mb-5">Nuevo evento</h2>

        <form id="form-event" method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data"
            class="flex flex-col gap-3">
            @csrf

            <input type="text" name="name" placeholder="Nombre del evento" required
                class="w-full bg-green-950/5 border border-green-950/20 rounded-xl px-4 py-2.5 text-green-950 text-sm placeholder-green-950/40 focus:outline-none focus:ring-2 focus:ring-green-600">

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-xs font-semibold text-green-950/60 uppercase tracking-wider">Fecha inicio</label>
                    <input type="date" name="dateIni" id="input-date-ini" required
                        class="w-full bg-green-950/5 border border-green-950/20 rounded-xl px-4 py-2.5 text-green-950 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 mt-1">
                </div>
                <div>
                    <label class="text-xs font-semibold text-green-950/60 uppercase tracking-wider">Fecha fin</label>
                    <input type="date" name="dateFin" required
                        class="w-full bg-green-950/5 border border-green-950/20 rounded-xl px-4 py-2.5 text-green-950 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 mt-1">
                </div>
            </div>

            <div>
                <label class="text-xs font-semibold text-green-950/60 uppercase tracking-wider">Cartel</label>
                <input type="file" name="cartel" accept="image/*,application/pdf"
                    class="w-full bg-green-950/5 border border-green-950/20 rounded-xl px-4 py-2.5 text-green-950 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 mt-1">
            </div>

            <div>
                <label class="text-xs font-semibold text-green-950/60 uppercase tracking-wider">Pueblo</label>
                <select name="pueblo_id" required
                    class="w-full bg-green-950/5 border border-green-950/20 rounded-xl px-4 py-2.5 text-green-950 text-sm focus:outline-none focus:ring-2 focus:ring-green-600 mt-1 appearance-none">
                    <option value="">Selecciona un pueblo</option>
                    @foreach($pueblos as $pueblo)
                        <option value="{{ $pueblo->id }}">{{ $pueblo->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="w-full bg-green-950 text-amber-50 rounded-full py-2.5 font-bold uppercase tracking-widest text-sm hover:bg-green-800 transition mt-2">
                <i class="fa fa-save mr-2"></i>Guardar
            </button>
        </form>
    </div>
</div>
@endif

{{-- ========== DATOS PARA JS ========== --}}
<script>
    var events  = @json($events);
    var pueblos = @json($pueblos->pluck('name', 'id'));
    var isAdmin = @json($isAdmin);

    var MONTHS = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
                  "Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

    var today     = new Date();
    var todayY    = today.getFullYear();
    var todayM    = today.getMonth();   // 0-based
    var todayD    = today.getDate();

    var currentY  = todayY;
    var currentM  = todayM; // 0-based

    // Pad helper
    function pad(n){ return String(n).padStart(2,'0'); }

    // Formato YYYY-MM-DD
    function fmtDate(y,m,d){ return y+'-'+pad(m+1)+'-'+pad(d); }

    // ---- Construir el grid ----
    function buildGrid(year, month) {
        var grid    = document.getElementById('cal-grid');
        var daysInMonth = new Date(year, month+1, 0).getDate();
        // 0=Sun→6=Sat, queremos 0=Lun→6=Dom
        var firstDow = (new Date(year, month, 1).getDay() + 6) % 7;

        // Días con evento
        var eventDays = {};
        events.forEach(function(ev){
            var ini = new Date(ev.dateIni + 'T00:00:00');
            var fin = new Date(ev.dateFin + 'T00:00:00');
            for(var d = new Date(ini); d <= fin; d.setDate(d.getDate()+1)){
                if(d.getFullYear()===year && d.getMonth()===month){
                    eventDays[d.getDate()] = true;
                }
            }
        });

        var html = '';

        // Celdas vacías al inicio
        for(var i=0; i<firstDow; i++){
            html += '<div class="aspect-square"></div>';
        }

        // Días
        for(var d=1; d<=daysInMonth; d++){
            var dateStr  = fmtDate(year, month, d);
            var isToday  = (d===todayD && month===todayM && year===todayY);
            var hasEvent = !!eventDays[d];

            html += '<div data-date="'+dateStr+'" onclick="selectDay(this)"'
                  + ' class="cal-cell aspect-square flex items-center justify-center relative cursor-pointer rounded-full'
                  + ' hover:bg-yellow-400/50 transition select-none group'
                  + (isToday ? ' bg-yellow-400' : '')
                  + '">'
                  + '<span class="text-xs md:text-sm font-semibold '
                  + (isToday ? 'text-green-950' : 'text-green-950')
                  + '">'+ d +'</span>'
                  + (hasEvent ? '<span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 rounded-full bg-yellow-400 border-2 border-green-950"></span>' : '')
                  + '</div>';
        }

        grid.innerHTML = html;
    }

    // ---- Seleccionar día ----
    function selectDay(el) {
        document.querySelectorAll('.cal-cell').forEach(function(c){
            c.classList.remove('ring-2','ring-green-950','bg-yellow-400','!text-amber-50');
            c.querySelector('span').classList.remove('text-amber-50');
        });
        el.classList.add('ring-2','ring-green-950','bg-yellow-400');
        el.querySelector('span').classList.add('text-amber-50');

        var date = el.dataset.date;
        var parts = date.split('-');
        document.getElementById('aside-day').textContent   = parts[2];
        document.getElementById('aside-month').textContent = MONTHS[parseInt(parts[1],10)-1];

        fillSidebar(date);
    }

    // ---- Sidebar eventos ----
    function fillSidebar(dateStr) {
        var list = document.getElementById('event-list');
        var sel  = new Date(dateStr + 'T00:00:00');
        var found = events.filter(function(ev){
            return sel >= new Date(ev.dateIni+'T00:00:00') && sel <= new Date(ev.dateFin+'T00:00:00');
        });

        if(!found.length){
            list.innerHTML = '<p class="text-green-950/40 text-xs text-center mt-4">Sin eventos este día</p>';
            return;
        }

        list.innerHTML = found.map(function(ev){
            return `<div class="flex items-center justify-between gap-2 bg-green-950 rounded-xl px-3 py-2">
                <i class="fa-solid fa-caret-right text-amber-50 shrink-0"></i>
                <span class="text-amber-50 text-sm font-medium flex-1 truncate">${ev.name} - ${ev.pueblo ? ev.pueblo.name : ''}</span>
                ${ev.cartel
                    ? `<a href="storage/carteles/${ev.cartel}" target="_blank">
                        <button class="bg-amber-50 text-green-950 px-3 py-1 rounded-lg text-xs font-bold hover:bg-yellow-300 transition shrink-0">Abrir</button>
                    </a>`
                    : ''}
            </div>`;
        }).join('');
    }

    // ---- Header ----
    function updateHeader(){
        document.getElementById('header-month').textContent = MONTHS[currentM];
        document.getElementById('header-year').textContent  = currentY;
    }

    // ---- Render completo ----
    function render(){ buildGrid(currentY, currentM); updateHeader(); }

    // ---- Botones ----
    document.getElementById('btn-prev').addEventListener('click', function(){
        if(currentM === 0){ currentM = 11; currentY--; } else { currentM--; }
        render();
    });
    document.getElementById('btn-next').addEventListener('click', function(){
        if(currentM === 11){ currentM = 0; currentY++; } else { currentM++; }
        render();
    });
    document.getElementById('btn-today').addEventListener('click', function(){
        currentY = todayY; currentM = todayM;
        render();
        // Seleccionar celda de hoy
        setTimeout(function(){
            var todayCell = document.querySelector('[data-date="'+fmtDate(todayY,todayM,todayD)+'"]');
            if(todayCell) selectDay(todayCell);
        }, 0);
    });

    // ---- Modal ----
    @if($isAdmin)
    document.getElementById('btn-add-event').addEventListener('click', function(){
        document.getElementById('modal-event').classList.remove('hidden');
    });
    document.getElementById('btn-close-modal').addEventListener('click', function(){
        document.getElementById('modal-event').classList.add('hidden');
    });
    document.getElementById('modal-event').addEventListener('click', function(e){
        if(e.target === this) this.classList.add('hidden');
    });
    @endif

    render();

    // Resaltar hoy al cargar
    setTimeout(function(){
        var todayCell = document.querySelector('[data-date="'+fmtDate(todayY,todayM,todayD)+'"]');
        if(todayCell){
            selectDay(todayCell);
        } else {
            document.getElementById('aside-day').textContent   = pad(todayD);
            document.getElementById('aside-month').textContent = MONTHS[todayM];
            fillSidebar(fmtDate(todayY,todayM,todayD));
        }
    }, 0);
</script>

@endsection
