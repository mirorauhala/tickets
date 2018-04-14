<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ active('tickets') }}" href="{{ route('tickets') }}">{{ tra('tickets.nav.paid') }}</a>

            <a role="presentation" class="app-link {{ active('tickets.pending') }}" href="{{ route('tickets.pending') }}">{{ tra('tickets.nav.pending') }}</a>

            <a role="presentation" class="app-link {{ active('tickets.redeem') }}" href="{{ route('tickets.redeem') }}">{{ tra('tickets.nav.redeem') }}</a>

        </div>
    </div>
</section>
