<nav>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link{{ active('tickets') }}" href="{{ route('tickets') }}">Paid</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('tickets.pending') }}" href="{{ route('tickets.pending') }}">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('tickets.redeem') }}" href="{{ route('tickets.redeem') }}">Redeem</a>
        </li>
    </ul>
</nav>
