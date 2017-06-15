<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ Helper::route_active(['tickets.paid'], [], 'active') }}" href="{{ route('tickets.paid') }}">{{ Helper::tra('tickets.nav.paid') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['tickets.pending'], [], 'active') }}" href="{{ route('tickets.pending') }}">{{ Helper::tra('tickets.nav.pending') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['tickets.unassigned'], [], 'active') }}" href="{{ route('tickets.unassigned') }}">{{ Helper::tra('tickets.nav.unassigned') }}</a>

            <a role="presentation" class="app-link {{ Helper::route_active(['tickets.redeem'], [], 'active') }}" href="{{ route('tickets.redeem') }}">{{ Helper::tra('tickets.nav.redeem') }}</a>

        </div>
    </div>
</section>
