@if (session('error'))
    <div class="alert alert-dangger text-center">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif