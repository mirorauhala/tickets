<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ Helper::route_active(['settings.profile'], []) }}" href="{{ route('settings.profile') }}">{{ __('settings.nav.profile') }}</a>
            <a role="presentation" class="app-link {{ Helper::route_active(['settings.password*'], []) }}" href="{{ route('settings.password') }}">{{ __('settings.nav.change-password') }}</a>
            <a role="presentation" class="app-link {{ Helper::route_active(['settings.language*'], []) }}" href="{{ route('settings.language') }}">{{ __('settings.nav.language') }}</a>
            <a role="presentation" class="app-link {{ Helper::route_active(['settings.transactions*'], []) }}" href="{{ route('settings.transactions.all') }}">{{ __('settings.nav.transactions') }}</a>
        </div>
    </div>
</section>
