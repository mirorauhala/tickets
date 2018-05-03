<nav>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link{{ active(['tickets', 'tickets.share']) }}" href="{{ route('tickets') }}">{{ tra('tickets.nav.tickets') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('tickets.redeem') }}" href="{{ route('tickets.redeem') }}">{{ tra('tickets.nav.redeem') }}</a>
        </li>
    </ul>
</nav>
