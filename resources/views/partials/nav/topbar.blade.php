
<section class="application-navigation">
    <div class="application-container">
        <div class="application-navigation-links">
            <a role="presentation" class="app-link {{ active('event') }}" href="{{ route('event') }}">{{ tra('event.nav.details') }}</a>

            <a role="presentation" class="app-link {{ active('events.map*') }}" href="{{ route('events.map') }}">{{ tra('event.nav.map') }}</a>

            <a role="presentation" class="app-link {{ active('events.tickets*') }}" href="{{ route('events.tickets') }}">{{ tra('event.nav.tickets') }}</a>

        </div>
    </div>
</section>
