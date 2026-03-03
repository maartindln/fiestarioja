<?php $__env->startSection('titulo', 'Listado'); ?>
<?php $__env->startSection('content'); ?>
<div class="w-full h-full overflow-hidden bg-amber-50">
  <div class="sm:px-20 px-6 flex flex-col gap-4 justify-center items-center">

    <!-- Heading -->
    <div class="w-fit sm:my-20 my-10">
      <h2 class="sm:text-5xl font-bold text-green-950 pb-2">PUEBLOS</h2>
      <div class="rounded-t-full border-[1px] border-gray-500 dark:border-gray-400 overflow-hidden">
        <hr class="border-[3px] border-green-400 border-green-600 w-[40%]" />
      </div>
    </div>

    <!-- Buscador -->
    <script src="https://cdn.tailwindcss.com"></script>
        <div class="h-screen flex justify-center items-center bg-gray-600">
        <script>
            tailwind.config = {
            theme: {
                extend: {
                keyframes: {
                    quacke: {
                    '0%, 100%': { transform: 'rotate(-3deg)' },
                    '50%': { transform: 'rotate(3deg)' }
                    }
                },
                animation: {
                    quacke: 'quacke .3s ease-in-out infinite',
                }
                }
            }
            }
        </script>
        <div class="relative max-w-12 focus-within:max-w-full transition-[max-width] ease-in-out duration-300">
            <input class="block w-full border-none outline-none rounded-full p-[12px] px-4 text-base placeholder:text-transparent focus:placeholder:text-gray-500" placeholder="Buscar festivo...">
            <i class="fa fa-search absolute top-1/2 right-6 -translate-y-1/2 translate-x-1/2 pointer-events-none"></i>
        </div>
        </div>
    <input
      type="text"
      id="buscador-pueblos"
      placeholder="Buscar festivo..."
      class="w-full sm:w-1/2 px-4 py-2 border border-gray-300 rounded mb-6 focus:outline-none focus:ring-2 focus:ring-green-500"
    />

    <!-- Lista de pueblos que se actualiza -->
    <div id="lista-pueblos" class="w-full flex flex-col gap-4">
      <?php echo $__env->make('pueblos.lista', ['pueblos' => $pueblos], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#buscador-pueblos').val('');
    });
  $('#buscador-pueblos').on('keyup', function () {
    let search = $(this).val();

    $.ajax({
      url: "<?php echo e(route('pueblos.search')); ?>",
      method: 'GET',
      data: { search: search },
      success: function (data) {
        $('#lista-pueblos').html(data);
      },
      error: function() {
        console.error('Error en la petición AJAX.');
      }
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/listado.blade.php ENDPATH**/ ?>