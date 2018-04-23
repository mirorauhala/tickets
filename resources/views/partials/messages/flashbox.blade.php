@if (session('flash_message'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-{{ session('flash_status') }}">
            {{ session('flash_message') }}
        </div>
    </div>
</div>
@endif
