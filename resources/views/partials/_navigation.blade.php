<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white w-100">
    <div class="container">
        <a class="navbar-brand" href="{{ route('events') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link{{ active('events') }}" href="{{ route('events') }}">{{ tra('nav.featured') }} <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ active('tickets') }}" href="{{ route('tickets') }}">{{ tra('nav.tickets') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ active('orders*') }}" href="{{ route('orders') }}">{{ tra('nav.orders') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth()
                    @if(count(auth()->user()->events) > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ tra('nav.manage') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach(auth()->user()->events as $event)
                                    <a class="dropdown-item" href="{{ route('dashboard.show', $event) }}">{{ $event->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link{{ active('settings') }}" href="{{ route('settings') }}">{{ tra('nav.settings') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ tra('nav.sign-out')}}</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link{{ active('login') }}" href="{{ route('login') }}">{{ tra('nav.sign-in') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ active('register') }}" href="{{ route('register') }}">{{ tra('nav.sign-up') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="navigation">
    <div class="links">
        <a class="link {{ active('event*') }}" href="{{ route('events') }}">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>
            <span>{{ tra('nav.featured') }}</span>
        </a>
        <a class="link {{ active('tickets*') }}" href="{{ route('tickets') }}">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M15.58,16.8L12,14.5L8.42,16.8L9.5,12.68L6.21,10L10.46,9.74L12,5.8L13.54,9.74L17.79,10L14.5,12.68M20,12C20,10.89 20.9,10 22,10V6C22,4.89 21.1,4 20,4H4A2,2 0 0,0 2,6V10C3.11,10 4,10.9 4,12A2,2 0 0,1 2,14V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V14A2,2 0 0,1 20,12Z" /></svg>
            <span>{{ tra('nav.tickets') }}</span>
        </a>
        <a class="link {{ active('settings*') }}" href="{{ route('settings') }}">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" /></svg>
            <span>{{ tra('nav.settings') }}</span>
        </a>
    </div>
</div>

