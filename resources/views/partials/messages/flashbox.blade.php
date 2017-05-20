<div class="row">
    <div class="col-md-12">

    @if (session('flash_message'))
        <div class="alert alert-{{ session('flash_status') }}">
            {{ session('flash_message') }}
        </div>
    @endif

    </div>
</div>
