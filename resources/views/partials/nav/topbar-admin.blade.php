
<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ Helper::route_active(['events.admin.orders'], [], 'active') }}" href="{{ route('events.admin.orders') }}">{{ Helper::tra('event.admin.nav.orders') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.admin.tickets*'], [], 'active') }}" href="{{ route('events.admin.tickets.list') }}">{{ Helper::tra('event.admin.nav.tickets') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.admin.maps*'], [], 'active') }}" href="{{ route('events.admin.maps') }}">{{ Helper::tra('event.admin.nav.maps') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['events.admin.tournaments*'], [], 'active') }}" href="{{ route('events.admin.tournaments') }}">{{ Helper::tra('event.admin.nav.tournaments') }}</a>
            <a role="presentation" class="app-link {{ Helper::route_active(['events.admin.settings*'], [], 'active') }}" href="{{ route('events.admin.settings') }}">{{ Helper::tra('event.admin.nav.settings') }}</a>

        </div>
    </div>
</section>
