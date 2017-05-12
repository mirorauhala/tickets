<aside class="sidebar">
    <div class="sidebar-scrollable">
        <div class="sidebar-contents">

            <a href="#" class="sidebar-logo"><image src="/images/tikematic.SVG" height="30" alt="Tikematic"></a>
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-title">{{ __('nav.title.featured-event') }}</li>
                <li class="{{ Helper::route_active(['events*'], ['events.admin*']) }}"><a href="{{ route('events.details') }}">Connection Lan: eSports 2017</a></li>
            </ul>

            <ul class="nav nav-pills nav-stacked">
                <li class="nav-title">{{ __('nav.title.personal') }}</li>
                <li class="{{ Helper::route_active(['tickets*']) }}"><a href="{{ route('tickets') }}">{{ __('nav.my-tickets') }}</a></li>
                <li class="{{ Helper::route_active(['tournaments*']) }}"><a href="{{ route('tournaments') }}">{{ __('nav.my-tournaments') }}</a></li>
            </ul>

            @if(Auth::user() && count(Auth::user()->events) > 0)
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-title">{{ __('nav.title.organizations') }}</li>
                    @foreach(Auth::user()->events as $event)
                        <li class="{{ Helper::route_active(['events.admin*']) }}"><a href="{{ route('events.admin.customers') }}">{{ $event->name }}</a></li>
                    @endforeach
                </ul>
            @endif

            <div class="sidebar-nav-bottom">
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-title">{{ __('nav.title.account') }}</li>
                    <li class="{{ Helper::route_active(['settings*']) }}"><a href="{{ route('settings.profile') }}">{{ __('nav.profile') }}</a></li>
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

                    <p class="legal"><a href="#">{{ __('nav.privacy-policy') }}</a><br>&copy; Tikematic 2017. {{ __('nav.made-in') }}</p>

                </ul>
            </div>
        </div>
    </div>

</aside>
