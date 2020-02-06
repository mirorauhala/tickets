<nav class="mb-5 pr-8">
    <ul class="flex flex-col">
        <li>
            <a class="block text-lg rounded-lg font-medium bg-white py-2 {{ active('settings') }}" href="{{ route('settings') }}">{{ tra('settings.menu.account') }}</a>
        </li>
        <li>
            <a class="block text-lg rounded-lg font-medium bg-white py-2 {{ active('settings.password') }}" href="{{ route('settings.password') }}">{{ tra('settings.menu.password') }}</a>
        </li>
        <li>
            <a class="block text-lg rounded-lg font-medium bg-white py-2 {{ active('settings.language') }}" href="{{ route('settings.language') }}">{{ tra('settings.menu.language') }}</a>
        </li>
        <li>
            <a class="block text-lg rounded-lg font-medium bg-white py-2 {{ active('settings.about') }}" href="{{ route('settings.about') }}">{{ tra('settings.menu.about') }}</a>
        </li>
    </ul>
</nav>
