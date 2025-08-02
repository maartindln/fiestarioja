<?php if(session('success')): ?>
    <div class="alert flex fixed inset-x-0 top-0 mx-auto mt-4 w-fit max-w-md z-50 w-96 shadow-lg rounded-lg animate__animated animate__fadeInDown">
        <div class="bg-green-600 py-4 px-6 rounded-l-lg flex items-center">
            <i class="fa-solid fa-circle-check text-white text-2xl"></i>
        </div>
        <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div><?php echo e(session('success')); ?></div>
            <button onclick="closeAlert(this)">
                <i class="fa-solid fa-xmark mr-4 ml-4"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert flex fixed inset-x-0 top-0 mx-auto mt-4 w-fit max-w-md z-50 w-96 shadow-lg rounded-lg animate__animated animate__fadeInDown">
        <div class="bg-red-600 py-4 px-6 rounded-l-lg flex items-center">
            <i class="fa-solid fa-circle-xmark text-white text-2xl"></i>
        </div>
        <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div><?php echo e(session('error')); ?></div>
            <button onclick="closeAlert(this)">
                <i class="fa-solid fa-xmark mr-4 ml-4"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<script>
    function closeAlert(button) {
        const alert = button.closest('.alert');
        if (alert) {
            alert.classList.remove('animate__fadeInDown');
            alert.classList.add('animate__fadeOutUp');
            setTimeout(() => alert.remove(), 800);
        }
    }

     setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('animate__fadeInDown');
                alert.classList.add('animate__fadeOutUp');
                setTimeout(() => alert.remove(), 800);
            }
        }, 5000);
</script>
<?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/alerts.blade.php ENDPATH**/ ?>