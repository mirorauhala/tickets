<div class="row">

    <div class="col-md-12">
        @if($event->is_visible == 1)
            <div class="alert alert-success">
                {!! __('event.admin.visibility.offline', ['attributes' => 'class="btn btn-sm btn-success" href="'. route("events.admin.settings") .'"']) !!}
            </div>
        @else
            <div class="alert alert-warning">
                {!! __('event.admin.visibility.online', ['attributes' => 'class="btn btn-sm btn-warning" href="'. route("events.admin.settings") .'"']) !!}
            </div>
        @endif
    </div>

</div>
