@if (session('error'))
<div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    <span>{{ session('error') }}</span>
</div>
@endif