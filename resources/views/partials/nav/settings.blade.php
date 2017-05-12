<ul class="nav nav-pills">
    <li role="presentation" class="{{ Helper::route_active(['settings.profile']) }}">
        <a href="{{ route('settings.profile') }}">{{ __('settings.nav.profile') }}</a>
    </li>
    <li role="presentation" class="{{ Helper::route_active(['settings.password']) }}">
        <a href="{{ route('settings.password') }}">{{ __('settings.nav.change-password') }}</a>
    </li>
    <li role="presentation" class="{{ Helper::route_active(['settings.language']) }}">
        <a href="{{ route('settings.language') }}">{{ __('settings.nav.language') }}</a>
    </li>
    <li role="presentation" class="{{ Helper::route_active(['settings.transactions*']) }}">
        <a href="{{ route('settings.transactions.all') }}">{{ __('settings.nav.transactions') }}</a>
    </li>
</ul>
