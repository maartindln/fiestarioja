//global variables
var monthEl = $(".c-main");
var dataCel = $(".c-cal__cel");
var dateObj = new Date();
var month = dateObj.getUTCMonth() + 1;
var day = dateObj.getUTCDate();
var year = dateObj.getUTCFullYear();
var monthText = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre"
];
var indexMonth = month;
var todayBtn = $(".c-today__btn");
var addBtn = $(".js-event__add");
var closeBtn = $(".js-event__close");
var winCreator = $(".js-event__creator");
var inputDate = $(this).data();
today = year + "-" + String(month).padStart(2, "0") + "-" + String(day).padStart(2, "0");

//button of the current day
todayBtn.on("click", function() {
  if (month < indexMonth) {
    var step = indexMonth % month;
    movePrev(step, true);
  } else if (month > indexMonth) {
    var step = month - indexMonth;
    moveNext(step, true);
  }
  dataCel.removeClass("isSelected");
    dataCel.each(function() {
    if ($(this).data("day") === today) {
        $(this).addClass("isSelected");
        fillEventSidebar(today);
    }
    });
  $(".c-aside__num").text(String(day).padStart(2, "0"));
  $(".c-aside__month").text(monthText[month - 1]);
});

//higlight the cel of current day
dataCel.each(function() {
  if ($(this).data("day") === today) {
    $(this).addClass("isSelected");
    fillEventSidebar(today);
  }
});

//window event creator
addBtn.on("click", function() {
  winCreator.addClass("isVisible");
  $("body").addClass("overlay");
  dataCel.each(function() {
    if ($(this).hasClass("isSelected")) {
      today = $(this).data("day");
      document.querySelector('input[type="date"]').value = today;
    } else {
      document.querySelector('input[type="date"]').value = today;
    }
  });
});
closeBtn.on("click", function() {
  winCreator.removeClass("isVisible");
  $("body").removeClass("overlay");
});

//fill sidebar event info
function fillEventSidebar(fechaSeleccionada) {
  $(".c-aside__eventList").empty(); // Limpiamos la lista

  events.forEach(function(event) {
    var inicio = new Date(event.dateIni);
    var fin = new Date(event.dateFin);
    var seleccion = new Date(fechaSeleccionada);

    if (seleccion >= inicio && seleccion <= fin) {
      $(".c-aside__eventList").append(`
        <div class="c-aside__eventItem flex justify-between items-center p-2 bg-green-950 rounded shadow-sm hover:bg-green-950/70 transition-colors">
          <i class="fa-solid fa-caret-right text-amber-50"></i>
          <span class="text-amber-50 font-medium">${event.pueblo.name}</span>
            <a href="storage/carteles/${event.cartel}" target="_blank">
            <button class="bg-amber-50 text-green-950 px-4 py-2 rounded hover:bg-amber-50/70 transition-colors" data-event-id="{{ $event->id }}">
                Abrir
            </button>
           </a>
        </div>
      `);
    }
  });
}

// Click en la celda
dataCel.on("click", function() {
  var fecha = $(this).data("day");
  fillEventSidebar(fecha);

  var thisDay = fecha.slice(8);
  var thisMonth = fecha.slice(5, 7);
  $(".c-aside__num").text(thisDay);
  $(".c-aside__month").text(monthText[parseInt(thisMonth, 10) - 1]);

  dataCel.removeClass("isSelected");
  $(this).addClass("isSelected");
});


//function for move the months
function moveNext(fakeClick, indexNext) {
  for (var i = 0; i < fakeClick; i++) {
    $(".c-main").css({
      left: "-=100%"
    });
    $(".c-paginator__month").css({
      left: "-=100%"
    });
    switch (true) {
      case indexNext:
        indexMonth += 1;
        break;
    }
  }
}
function movePrev(fakeClick, indexPrev) {
  for (var i = 0; i < fakeClick; i++) {
    $(".c-main").css({
      left: "+=100%"
    });
    $(".c-paginator__month").css({
      left: "+=100%"
    });
    switch (true) {
      case indexPrev:
        indexMonth -= 1;
        break;
    }
  }
}

//months paginator
function buttonsPaginator(buttonId, mainClass, monthClass, next, prev) {
  switch (true) {
    case next:
      $(buttonId).on("click", function() {
        if (indexMonth >= 2) {
          $(mainClass).css({
            left: "+=100%"
          });
          $(monthClass).css({
            left: "+=100%"
          });
          indexMonth -= 1;
        }
        return indexMonth;
      });
      break;
    case prev:
      $(buttonId).on("click", function() {
        if (indexMonth <= 11) {
          $(mainClass).css({
            left: "-=100%"
          });
          $(monthClass).css({
            left: "-=100%"
          });
          indexMonth += 1;
        }
        return indexMonth;
      });
      break;
  }
}

buttonsPaginator("#next", monthEl, ".c-paginator__month", false, true);
buttonsPaginator("#prev", monthEl, ".c-paginator__month", true, false);

//launch function to set the current month
moveNext(indexMonth - 1, false);

//fill the sidebar with current day
$(".c-aside__num").text(String(day).padStart(2, "0"));
$(".c-aside__month").text(monthText[month - 1]);
