<?php $__env->startSection('titulo', 'Calendario'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/calendario.css')); ?>">
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
        <?php if(auth()->guard()->check()): ?>
        <?php
            $email = Auth::user()->email;
            $admin = DB::table('users')->where('email', $email)->where('role', 'Administrador')->first();
        ?>
        <?php if($admin): ?>
        <a class="c-add o-btn js-event__add text-amber-50" href="javascript:;">Añadir evento <span class="fa fa-plus"></span></a>
        <?php endif; ?>
        <?php endif; ?>
      <div class="c-aside__day">
        <span class="c-aside__num text-green-950"></span> <span class="c-aside__month text-green-950"></span>
      </div>
    <div class="c-aside__eventList space-y-2">
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="c-aside__eventItem flex justify-between items-center p-2 bg-green-950 rounded shadow-sm hover:bg-green-950/70 transition-colors">
                <i class="fa-solid fa-caret-right text-amber-50"></i>
                <span class="text-amber-50 font-medium"><?php echo e($event->pueblo->name); ?></span>
                <a href="<?php echo e(asset('storage/carteles/' . $event->cartel)); ?>" target="_blank">
                <button class="bg-amber-50 text-green-950 px-4 py-2 rounded hover:bg-amber-50/70 transition-colors" data-event-id="<?php echo e($event->id); ?>">
                    Abrir
                </button>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <form id="addEvent" method="POST" action="<?php echo e(route('events.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
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
                <?php $__currentLoopData = $pueblos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pueblo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pueblo->id); ?>"><?php echo e($pueblo->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <br><br>
            <button type="submit" class="o-btn text-amber-50">GUARDAR <span class="fa fa-save text-amber-50"></span></button>
        </form>
    </div>
</div>
<script>
  var pueblos = <?php echo json_encode($pueblos->pluck('name', 'id'), 512) ?>;
  var events = <?php echo json_encode($events, 15, 512) ?>;
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/calendario/calendario.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/FIESTARIOJA/fiestarioja/resources/views/calendario.blade.php ENDPATH**/ ?>