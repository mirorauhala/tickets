<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ Helper::route_active(['settings'], []) }}" href="{{ route('settings') }}">{{ Helper::tra('settings.nav.profile') }}</a>
            <a role="presentation" class="app-link {{ Helper::route_active(['settings.password*'], []) }}" href="{{ route('settings.password') }}">{{ Helper::tra('settings.nav.change-password') }}</a>
            <a role="presentation" class="app-link {{ Helper::route_active(['settings.language*'], []) }}" href="{{ route('settings.language') }}">{{ Helper::tra('settings.nav.language') }}</a>
            <a role="presentation" class="app-link {{ Helper::route_active(['settings.orders*'], []) }}" href="{{ route('settings.orders.all') }}">{{ Helper::tra('settings.nav.orders') }}</a>
        </div>
    </div>
</section>
