@extends('layout')
@section('titulo', 'Calendario')
@section('content')
<link rel="stylesheet" href="{{ asset('css/calendario.css') }}">
<script>
  // fill the month table with column headings
function day_title(day_name) {
    document.write("<div class='c-cal__col'>" + day_name + "</div>");
  }
  // fills the month table with numbers
function fill_table(month, month_length, indexMonth) {
    day = 1;
    // begin the new month table
    document.write("<div class='c-main c-main-" + indexMonth + "'>");
    //document.write("<b>"+month+" "+year+"</b>")

    // column headings
    document.write("<div class='c-cal__row'>");
    day_title("Lun");
    day_title("Mar");
    day_title("Mie");
    day_title("Jue");
    day_title("Vie");
    day_title("Sab");
    day_title("Dom");
    document.write("</div>");
    document.write("<div class='c-cal__row'>");
    for (var i = 1; i < start_day; i++) {
      if (start_day > 7) {
      } else {
        document.write("<div class='c-cal__cel'></div>");
      }
    }
    for (var i = start_day; i < 8; i++) {
      document.write(
        "<div data-day='" + year + "-" +
          indexMonth +
          "-0" +
          day +
          "'class='c-cal__cel'><p>" +
          day +
          "</p></div>"
      );
      day++;
    }
    document.write("</div>");
    while (day <= month_length) {
      document.write("<div class='c-cal__row'>");
      for (var i = 1; i <= 7 && day <= month_length; i++) {
        if (day >= 1 && day <= 9) {
          document.write(
            "<div data-day='" + year + "-" +
              indexMonth +
              "-0" +
              day +
              "'class='c-cal__cel'><p>" +
              day +
              "</p></div>"
          );
          day++;
        } else {
          document.write(
            "<div data-day='" + year + "-" +
              indexMonth +
              "-" +
              day +
              "' class='c-cal__cel'><p>" +
              day +
              "</p></div>"
          );
          day++;
        }
      }
      document.write("</div>");
      start_day = i;
    }
    document.write("</div>");
  }
</script>
<header>
  <div class="wrapper">
    <div class="c-monthyear">
    <div class="c-month">
        <span id="prev" class="prev fa fa-angle-left text-amber-50" aria-hidden="true"></span>
        <div id="c-paginator">
          <span class="c-paginator__month text-green-950">ENERO</span>
          <span class="c-paginator__month text-green-950">FEBRERO</span>
          <span class="c-paginator__month text-green-950">MARZO</span>
          <span class="c-paginator__month text-green-950">ABRIL</span>
          <span class="c-paginator__month text-green-950">MAYO</span>
          <span class="c-paginator__month text-green-950">JUNIO</span>
          <span class="c-paginator__month text-green-950">JULIO</span>
          <span class="c-paginator__month text-green-950">AGOSTO</span>
          <span class="c-paginator__month text-green-950">SEPTIEMBRE</span>
          <span class="c-paginator__month text-green-950">OCTUBRE</span>
          <span class="c-paginator__month text-green-950">NOVIEMBRE</span>
          <span class="c-paginator__month text-green-950">DICIEMBRE</span>
        </div>
        <span id="next" class="next fa fa-angle-right text-amber-50" aria-hidden="true"></span>
      </div>
      <span class="c-paginator__year text-green-950 font-bold" id="year"></span>
    </div>
    <div class="c-sort">
      <a class="o-btn c-today__btn" href="javascript:;">HOY</a>
    </div>
  </div>
</header>
<div class="wrapper">
  <div class="c-calendar">
    <div class="c-calendar__style c-aside">
        @auth
        @php
            $email = Auth::user()->email;
            $admin = DB::table('users')->where('email', $email)->where('role', 'Administrador')->first();
        @endphp
        @if ($admin)
        <a class="c-add o-btn js-event__add text-amber-50" href="javascript:;">Añadir evento <span class="fa fa-plus"></span></a>
        @endif
        @endauth
      <div class="c-aside__day">
        <span class="c-aside__num text-green-950"></span> <span class="c-aside__month text-green-950"></span>
      </div>
    <div class="c-aside__eventList space-y-2">
        @foreach($events as $event)
            <div class="c-aside__eventItem flex justify-between items-center p-2 bg-green-950 rounded shadow-sm hover:bg-green-950/70 transition-colors">
                <i class="fa-solid fa-caret-right text-amber-50"></i>
                <span class="text-amber-50 font-medium">{{ $event->pueblo->name }}</span>
                <a href="#">
                <button class="bg-amber-50 text-green-950 px-4 py-2 rounded hover:bg-amber-50/70 transition-colors" data-event-id="{{ $event->id }}">
                    Abrir
                </button>
                </a>
            </div>
        @endforeach
    </div>
    </div>
    <div class="c-cal__container c-calendar__style">
      <script>
        year = new Date().getFullYear();
        document.getElementById("year").textContent = year;
        // first day of the week of the new year
        today = new Date("January 1, " + year);
        start_day = today.getDay();
        fill_table("January", 31, "01");
        fill_table("February", 28, "02");
        fill_table("March", 31, "03");
        fill_table("April", 30, "04");
        fill_table("May", 31, "05");
        fill_table("June", 30, "06");
        fill_table("July", 31, "07");
        fill_table("August", 31, "08");
        fill_table("September", 30, "09");
        fill_table("October", 31, "10");
        fill_table("November", 30, "11");
        fill_table("December", 31, "12");
      </script>
    </div>
  </div>
    <div class="c-event__creator c-calendar__style js-event__creator">
        <a href="javascript:;" class="o-btn js-event__close text-amber-50">
            CERRAR <span class="fa fa-close text-amber-50"></span>
        </a>
        <form id="addEvent" method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
            @csrf
            <input placeholder="Nombre del evento" type="text" name="name" required>
            <label>Fecha inicio:</label>
            <input type="date" name="dateIni" required>
            <label>Fecha fin:</label>
            <input type="date" name="dateFin" required>
            <label>Cartel:</label>
            <input type="file" name="cartel" accept="image/*,application/pdf">
            <label>Pueblo:</label>
            <select name="pueblo_id" required>
                <option value="">Selecciona un pueblo</option>
                @foreach($pueblos as $pueblo)
                    <option value="{{ $pueblo->id }}">{{ $pueblo->name }}</option>
                @endforeach
            </select>
            <br><br>
            <button type="submit" class="o-btn text-amber-50">GUARDAR <span class="fa fa-save text-amber-50"></span></button>
        </form>
    </div>
</div>
<script>
  var pueblos = @json($pueblos->pluck('name', 'id'));
  var events = @json($events);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/calendario/calendario.js"></script>
@endsection
