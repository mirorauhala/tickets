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
                <li class="{{ active('event*', ['events.admin*']) }}">
                    <a href="{{ route('event') }}">{{ tra('nav.home') }}</a>
                    <ul class="nav">
                        <li class="{{ active('event', ['events.admin*']) }}"><a href="{{ route('event') }}">{{ tra('nav.details') }}</a></li>
                        <li class="{{ active('events.map*', ['events.admin*']) }}"><a href="{{ route('events.map') }}">{{ tra('nav.map') }}</a></li>
                        <li class="{{ active('events.tickets*', ['events.admin*']) }}"><a href="{{ route('events.tickets') }}">{{ tra('nav.tickets') }}</a></li>
                    </ul>
                </li>
                <li class="{{ active('tickets*') }}"><a href="{{ route('tickets') }}">{{ tra('nav.my-tickets') }}</a></li>
            </ul>

            @if(Auth::user() && count(Auth::user()->events) > 0)
                <ul class="nav nav-stacked">
                    @foreach(Auth::user()->events as $event)
                        <li class="{{ active('events.admin*') }}"><a href="{{ route('events.admin.orders') }}">{{ $event->name }}</a></li>
                    @endforeach
                </ul>
            @endif

            <div class="sidebar-nav-bottom">
                <ul class="nav">
                    <li class="{{ active('settings*') }}"><a href="{{ route('settings') }}">{{ tra('nav.settings') }}</a></li>

                    @if (Auth::guest())
                        <li class="{{ active('login*') }}"><a href="{{ route('login') }}">{{ tra('nav.login') }}</a></li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ tra('nav.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif


                    <p class="legal">
                        <a href="https://goo.gl/QhFTuI" target="_blank" rel="noopener">{{ tra('nav.privacy-policy') }}</a> &nbsp; {{ tra('nav.made-in') }}
                    </p>

                </ul>
            </div>
        </div>
    </div>

</aside>
