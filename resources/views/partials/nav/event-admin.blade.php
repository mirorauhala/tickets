<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="{{ Helper::route_active(['events.admin.customers']) }}">
        <a href="{{ route('events.admin.customers') }}">{{ __('event.admin.nav.customers') }}</a>
    </li>
    <li role="presentation" class="{{ Helper::route_active(['events.admin.maps']) }}">
        <a href="{{ route('events.admin.maps') }}">{{ __('event.admin.nav.maps') }}</a>
    </li>
    <li role="presentation" class="{{ Helper::route_active(['events.admin.tickets']) }}">
        <a href="{{ route('events.admin.tickets') }}">{{ __('event.admin.nav.tickets') }}</a>
    </li>
    <li role="presentation" class="{{ Helper::route_active(['events.admin.prices*']) }}">
        <a href="{{ route('events.admin.prices') }}">{{ __('event.admin.nav.prices') }}</a>
    </li>
    <li role="presentation" class="{{ Helper::route_active(['events.admin.settings*']) }}">
        <a href="{{ route('events.admin.settings') }}">{{ __('event.admin.nav.settings') }}</a>
    </li>
</ul>
