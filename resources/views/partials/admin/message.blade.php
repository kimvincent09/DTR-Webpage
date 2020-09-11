@if (session('success-message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('success-message') }}</strong>
</div>
@endif

@if (session('info-message'))
<div class="alert alert-info" role="alert">
    <strong>{{ session('info-message') }}</strong>
</div>
@endif

@if (session('error-message'))
<div class="alert alert-danger" role="alert">
    <strong>{{ session('error-message') }}</strong>
</div>
@endif
@if (session('undo-message'))
<div class="alert alert-danger" role="alert">
    <strong>
        <a href="{{ route('employees.restore') }}" style="display:inline-block">{{ session('undo-message') }}</a>
    </strong>
</div>
@endif