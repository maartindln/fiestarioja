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
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white fill-current" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path></svg>
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
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/alerts.blade.php ENDPATH**/ ?>