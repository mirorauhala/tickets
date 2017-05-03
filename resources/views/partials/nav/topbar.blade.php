<div class="topbar">
    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.details'], 'active') }}" href="{{ route('events.details') }}" href="{{ route('events.details') }}">{{ __('event.nav.details') }}</a></li>

    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.maps*'], 'active') }}" href="{{ route('events.maps') }}">{{ __('event.nav.maps') }}</a></li>

    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.tickets*'], 'active') }}" href="{{ route('events.tickets') }}">{{ __('event.nav.tickets') }}</a></li>

    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.tournaments*'], 'active') }}" href="{{ route('events.tournaments') }}">{{ __('event.nav.tournaments') }}</a></li>

    @can('update', $event)
        <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.admin*'], 'active') }}" href="{{ route('events.admin.customers') }}">{{ __('event.nav.admin') }}</a></li>
    @endcan

</div>
