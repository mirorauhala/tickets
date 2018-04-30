<nav>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link{{ active('tickets') }}" href="{{ route('tickets') }}">{{ tra('tickets.nav.paid') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('tickets.pending') }}" href="{{ route('tickets.pending') }}">{{ tra('tickets.nav.pending') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('tickets.redeem') }}" href="{{ route('tickets.redeem') }}">{{ tra('tickets.nav.redeem') }}</a>
        </li>
    </ul>
</nav>
