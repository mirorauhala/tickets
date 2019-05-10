<nav class="mb-5">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link{{ active('settings') }}" href="{{ route('settings') }}">{{ tra('settings.menu.account') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('settings.password') }}" href="{{ route('settings.password') }}">{{ tra('settings.menu.password') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('settings.language') }}" href="{{ route('settings.language') }}">{{ tra('settings.menu.language') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active('settings.about') }}" href="{{ route('settings.about') }}">{{ tra('settings.menu.about') }}</a>
        </li>
    </ul>
</nav>
