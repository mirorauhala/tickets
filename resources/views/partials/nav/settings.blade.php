<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ active('settings') }}" href="{{ route('settings') }}">{{ tra('settings.nav.profile') }}</a>
            <a role="presentation" class="app-link {{ active('settings.password*') }}" href="{{ route('settings.password') }}">{{ tra('settings.nav.change-password') }}</a>
            <a role="presentation" class="app-link {{ active('settings.language*') }}" href="{{ route('settings.language') }}">{{ tra('settings.nav.language') }}</a>
            <a role="presentation" class="app-link {{ active('settings.orders*') }}" href="{{ route('settings.orders') }}">{{ tra('settings.nav.orders') }}</a>
        </div>
    </div>
</section>
