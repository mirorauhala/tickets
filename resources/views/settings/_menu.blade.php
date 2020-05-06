<nav>
    <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ active('settings') }}" href="{{ route('settings') }}">{{ __('settings.menu.account') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('settings.password') }}" href="{{ route('settings.password') }}">{{ __('settings.menu.password') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('settings.language') }}" href="{{ route('settings.language') }}">{{ __('settings.menu.language') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('settings.about') }}" href="{{ route('settings.about') }}">{{ __('settings.menu.about') }}</a>
        </li>
    </ul>
</nav>
