<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item{{ active('events*') }}">
                <a class="nav-link" href="{{ route('events.index') }}">{{ __('nav.featured') }} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item{{ active('tickets*') }}">
                <a class="nav-link" href="{{ route('tickets.index') }}">{{ __('nav.tickets') }}</a>
            </li>
            <li class="nav-item{{ active('orders*') }}">
                <a class="nav-link" href="{{ route('orders.index') }}">{{ __('nav.orders') }}</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
        @auth()
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="nav-dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hei, {{ auth()->user()->full_name() }}</a>
                <div class="dropdown-menu">

                    @if(count(auth()->user()->events) > 0)
                    <a class="dropdown-item{{ active('dashboard*') }}" href="{{ route('dashboard') }}">{{ __('nav.dashboard') }}</a>
                    <div class="dropdown-divider"></div>
                    @endif

                    <a class="dropdown-item{{ active('settings*') }}" href="{{ route('settings') }}">{{ __('nav.settings') }}</a>
                    <a class="dropdown-item text-danger" id="nav-logout" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">{{ __('nav.sign-out')}}</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link{{ active('login') }}" href="{{ route('login') }}">{{ __('nav.sign-in') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ active('register') }}" href="{{ route('register') }}">{{ __('nav.sign-up') }}</a>
            </li>
        @endauth
        </ul>
    </div>
</nav>
