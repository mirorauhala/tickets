
<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ active('events.admin.orders') }}" href="{{ route('events.admin.orders') }}">{{ tra('event.admin.nav.orders') }}</a>

            <a role="presentation" class="app-link {{ active('events.admin.tickets*') }}" href="{{ route('events.admin.tickets.list') }}">{{ tra('event.admin.nav.tickets') }}</a>

            <a role="presentation" class="app-link {{ active('events.admin.maps*') }}" href="{{ route('events.admin.maps') }}">{{ tra('event.admin.nav.maps') }}</a>

            <a role="presentation" class="app-link {{ active('events.admin.tournaments*') }}" href="{{ route('events.admin.tournaments') }}">{{ tra('event.admin.nav.tournaments') }}</a>

            <a role="presentation" class="app-link {{ active('events.admin.settings*') }}" href="{{ route('events.admin.settings') }}">{{ tra('event.admin.nav.settings') }}</a>

            <a role="presentation" class="app-link {{ active('events.admin.scanner*') }}" href="{{ route('events.admin.scanner') }}">{{ tra('event.admin.nav.scanner') }}</a>

        </div>
    </div>
</section>
