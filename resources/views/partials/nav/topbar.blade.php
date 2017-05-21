
<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ Helper::route_active(['events.details'], [], 'active') }}" href="{{ route('events.details') }}" href="{{ route('events.details') }}">{{ __('event.nav.details') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.map*'], [], 'active') }}" href="{{ route('events.maps') }}">{{ __('event.nav.maps') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.tickets*'], [], 'active') }}" href="{{ route('events.tickets') }}">{{ __('event.nav.tickets') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.tournaments*'], [], 'active') }}" href="{{ route('events.tournaments') }}">{{ __('event.nav.tournaments') }}</a>

        </div>
    </div>
</section>
