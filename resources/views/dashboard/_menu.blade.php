<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a class="nav-link{{ active(['dashboard.show', 'dashboard.customers']) }}" href="{{ route('dashboard.customers', $event) }}">{{ __('dashboard.nav.customers') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.tickets*') }}" href="{{ route('dashboard.tickets.index', $event) }}">{{ __('dashboard.nav.tickets') }}</a>
        @if(active('dashboard.tickets*', [], true))
        <ul class="nav flex-column pl-3 py-3">
            <li class="nav-item">
                <a class="nav-link{{ active(['dashboard.tickets.index', 'dashboard.tickets.show', 'dashboard.tickets.edit']) }}" href="{{ route('dashboard.tickets.index', $event) }}">{{ __('form.button.view') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ active('dashboard.tickets.create') }}" href="{{ route('dashboard.tickets.create', $event) }}">{{ __('form.button.create') }}</a>
            </li>
        </ul>
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.orders*') }}" href="{{ route('dashboard.orders', $event) }}">{{ __('dashboard.nav.orders') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.maps*') }}" href="{{ route('dashboard.maps.index', $event) }}">{{ __('dashboard.nav.maps') }}</a>
        @if(active('dashboard.maps*', [], true))
        <ul class="nav flex-column pl-3 py-3">
            <li class="nav-item">
                <a class="nav-link{{ active(['dashboard.maps.index', 'dashboard.maps.show', 'dashboard.maps.edit']) }}" href="{{ route('dashboard.maps.index', $event) }}">{{ __('form.button.view') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ active('dashboard.maps.create') }}" href="{{ route('dashboard.maps.create', $event) }}">{{ __('form.button.create') }}</a>
            </li>
        </ul>
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.settings*') }}" href="{{ route('dashboard.settings', $event) }}">{{ __('dashboard.nav.settings') }}</a>
    </li>
</ul>
