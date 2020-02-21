<nav>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ active('home') }}" href="{{ route('home') }}">Featured</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('events.index') }}" href="{{ route('events.index') }}">All</a>
        </li>
    </ul>
</nav>
