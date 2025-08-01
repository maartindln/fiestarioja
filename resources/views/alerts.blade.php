@if (session('success'))
    <div class="alert alert-success mt-28 p-4 rounded-lg bg-green-500 text-white shadow-md max-w-lg mx-auto" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger mt-28 p-4 rounded-lg bg-red-500 text-white shadow-md max-w-lg mx-auto" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-28 p-4 rounded-lg bg-red-500 text-white shadow-md max-w-lg mx-auto" role="alert">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                alert.style.display = 'none';
            }, 5000);
        });
    });
</script>
