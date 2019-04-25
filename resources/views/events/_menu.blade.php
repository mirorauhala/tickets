<nav class="mb-5">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link{{ active('events') }}" href="{{ route('events') }}">Featured</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('events.index') }}" href="{{ route('events.index') }}">All</a>
        </li>
    </ul>
</nav>
