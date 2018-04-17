<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a class="nav-link{{ active(['dashboard.show', 'dashboard.customers']) }}" href="{{ route('dashboard.customers', $event) }}">Customers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.tickets*') }}" href="{{ route('dashboard.tickets', $event) }}">Tickets</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.orders*') }}" href="{{ route('dashboard.orders', $event) }}">Orders</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.maps*') }}" href="{{ route('dashboard.maps', $event) }}">Maps</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.seats*') }}" href="{{ route('dashboard.seats', $event) }}">Seats</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ active('dashboard.settings*') }}" href="{{ route('dashboard.settings', $event) }}">Settings</a>
    </li>
</ul>
