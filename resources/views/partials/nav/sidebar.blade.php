<aside class="sidebar sidebar-closed">

    <section class="sidebar-top">

    </section>

    <div class="sidebar-scrollable">
        <div class="sidebar-contents">

            <a href="/" class="sidebar-content-logo">
                <img src="/images/connectionlan-logo-blue.svg" alt="Connectionlan">
                <p>OmaSp Stadion, Seinäjoki<br>29.9. - 1.10.2017</p>
            </a>

            <ul class="nav">
                <li class="{{ Helper::route_active(['events*'], ['events.admin*']) }}">
                    <a href="{{ route('events.details') }}">Home</a>
                    <ul class="nav">
                        <li class="{{ Helper::route_active(['events.details*'], ['events.admin*']) }}"><a href="{{ route('events.details') }}">Details</a></li>
                        <li class="{{ Helper::route_active(['events.maps*'], ['events.admin*']) }}"><a href="{{ route('events.maps') }}">Maps</a></li>
                        <li class="{{ Helper::route_active(['events.tickets*'], ['events.admin*']) }}"><a href="{{ route('events.tickets') }}">Tickets</a></li>
                        <li class="{{ Helper::route_active(['events.tournaments*'], ['events.admin*']) }}"><a href="{{ route('events.tournaments') }}">Tournaments</a></li>
                    </ul>
                </li>
                <li class="{{ Helper::route_active(['tickets*']) }}"><a href="{{ route('tickets') }}">{{ __('nav.my-tickets') }}</a></li>
                <li class="{{ Helper::route_active(['tournaments*']) }}"><a href="{{ route('tournaments') }}">{{ __('nav.my-tournaments') }}</a></li>
            </ul>

            @if(Auth::user() && count(Auth::user()->events) > 0)
                <ul class="nav nav-stacked">
                    @foreach(Auth::user()->events as $event)
                        <li class="{{ Helper::route_active(['events.admin*']) }}"><a href="{{ route('events.admin.orders') }}">{{ $event->name }}</a></li>
                    @endforeach
                </ul>
            @endif

            <div class="sidebar-nav-bottom">
                <ul class="nav">
                    <li class="{{ Helper::route_active(['settings*']) }}"><a href="{{ route('settings.profile') }}">{{ __('nav.settings') }}</a></li>

                    @if (Auth::guest())
                        <li class="{{ Helper::route_active(['login*']) }}"><a href="{{ route('login') }}">{{ __('nav.login') }}</a></li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('nav.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif


                    <p class="legal">
                        <img src="/images/tikematic-small.svg" alt="Tikematic"><br>
                        <a href="https://goo.gl/QhFTuI" target="_blank" rel="noopener">{{ __('nav.privacy-policy') }}</a> &nbsp; {{ __('nav.made-in') }}
                    </p>

                </ul>
            </div>
        </div>
    </div>

</aside>
