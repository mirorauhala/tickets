<section class="sidebar">

    <h1>Tikematic.</h1>
    <ul class="nav nav-pills nav-stacked">
        <li class="nav-title">Featured event</li>
        <li class="{{ Helper::route_active(['events*']) }}"><a href="{{ route('events.details') }}">Connection Lan: eSports 2017</a></li>
    </ul>

    <ul class="nav nav-pills nav-stacked">
        <li class="nav-title">Personal</li>
        <li class="{{ Helper::route_active(['tickets*']) }}"><a href="{{ route('tickets') }}">My Tickets</a></li>
        <li class="{{ Helper::route_active(['tournaments*']) }}"><a href="{{ route('tournaments') }}">My Tournaments</a></li>
    </ul>

    <ul class="nav nav-pills nav-stacked">
        <li class="nav-title">Account</li>
        <li class="{{ Helper::route_active(['settings*']) }}"><a href="{{ route('settings.profile') }}">Profile</a></li>
        <li class="{{ Helper::route_active(['settings*']) }}"><a href="{{ route('settings.profile') }}">Settings</a></li>

        @if (Auth::guest())
            <li class="{{ Helper::route_active(['login*']) }}"><a href="{{ route('login') }}">Log In</a></li>
        @else
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @endif

    </ul>

</section>
