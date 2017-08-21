
<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ Helper::route_active(['event'], [], 'active') }}" href="{{ route('event') }}">{{ Helper::tra('event.nav.details') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.map*'], [], 'active') }}" href="{{ route('events.map') }}">{{ Helper::tra('event.nav.map') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.tickets*'], [], 'active') }}" href="{{ route('events.tickets') }}">{{ Helper::tra('event.nav.tickets') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.tournaments*'], [], 'active') }}" href="{{ route('events.tournaments') }}">{{ Helper::tra('event.nav.tournaments') }}</a>

        </div>
    </div>
</section>
