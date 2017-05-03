<div class="topbar">
    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.details'], 'active') }}" href="{{ route('events.details') }}" href="{{ route('events.details') }}">Details</a></li>

    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.maps*'], 'active') }}" href="{{ route('events.maps') }}">Maps</a></li>

    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.tickets*'], 'active') }}" href="{{ route('events.tickets') }}">Tickets</a></li>

    <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.tournaments*'], 'active') }}" href="{{ route('events.tournaments') }}">Tournaments</a></li>

    @can('update', $event)
        <a role="presentation" class="btn btn-sm btn-link {{ Helper::route_active(['events.admin*'], 'active') }}" href="{{ route('events.admin.customers') }}">Admin</a></li>
    @endcan

</div>
