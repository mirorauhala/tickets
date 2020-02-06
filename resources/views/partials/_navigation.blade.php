<navigation
    :app="{
        name: 'Lippukauppa',
        link: '/'
    }"

    :left-links="[
        {
            text: 'Events',
            href: '{{ route('home') }}',
            active: {{ active(['home', 'events*']) ? 'true' : 'false' }}
        },
        {
            text: 'Tickets',
            href: '{{ route('tickets.index') }}',
            active: {{ active('tickets*') ? 'true' : 'false' }}
        },
        {
            text: 'Orders',
            href: '{{ route('orders.index') }}',
            active: {{ active('orders*') ? 'true' : 'false' }}
        }
    ]"

    @auth()
    :dropdown-links="[
        {
            text: 'Dashboard',
            href: '{{ route('dashboard') }}',
            active: {{ active('dashboard*') ? 'true' : 'false' }}
        },
        {
            text: 'Settings',
            href: '{{ route('settings') }}',
            active: {{ active('settings*') ? 'true' : 'false' }}
        }
    ]"

    :show-logout="true"

    @else
    :dropdown-links="[
        {
            text: 'Sign in',
            href: '{{ route('login') }}',
            active: {{ active('login') ? 'true' : 'false' }}
        },
        {
            text: 'Sign up',
            href: '{{ route('register') }}',
            active: {{ active('register') ? 'true' : 'false' }}
        }
    ]"

    @endauth
    ></navigation>
