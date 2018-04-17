<nav>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link{{ active('settings') }}" href="{{ route('settings') }}">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('settings.password') }}" href="{{ route('settings.password') }}">Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('settings.language') }}" href="{{ route('settings.language') }}">Language</a>
        </li>
    </ul>
</nav>
