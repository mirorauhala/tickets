<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item{{ active('events*') }}">
                <a class="nav-link" href="{{ route('events') }}">{{ tra('nav.featured') }} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item{{ active('tickets') }}">
                <a class="nav-link" href="{{ route('tickets') }}">{{ tra('nav.tickets') }}</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
        @auth()
            @if(count(auth()->user()->events) > 0)
                <li class="nav-item{{ active('dashboard*') }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ tra('nav.manage') }} <span class="sr-only">(current)</span></a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link{{ active('settings*') }}" href="{{ route('settings') }}">{{ tra('nav.settings') }}</a>
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
        @endauth
        </ul>
    </div>
</nav>
