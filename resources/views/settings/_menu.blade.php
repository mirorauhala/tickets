<nav class="mb-5 pr-8">
    <ul class="flex flex-col">
        <li class="mb-2">
            <a class="block rounded-lg border border-gray-300 font-medium bg-white py-2 px-4 {{ active('settings') }}" href="{{ route('settings') }}">{{ tra('settings.menu.account') }}</a>
        </li>
        <li class="mb-2">
            <a class="block rounded-lg border border-gray-300 font-medium bg-white py-2 px-4 {{ active('settings.password') }}" href="{{ route('settings.password') }}">{{ tra('settings.menu.password') }}</a>
        </li>
        <li class="mb-2">
            <a class="block rounded-lg border border-gray-300 font-medium bg-white py-2 px-4 {{ active('settings.language') }}" href="{{ route('settings.language') }}">{{ tra('settings.menu.language') }}</a>
        </li>
        <li class="mb-2">
            <a class="block rounded-lg border border-gray-300 font-medium bg-white py-2 px-4 {{ active('settings.about') }}" href="{{ route('settings.about') }}">{{ tra('settings.menu.about') }}</a>
        </li>
    </ul>
</nav>
