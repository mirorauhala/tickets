<nav class="mb-5">
    <ul class="flex">
        <li class="pr-3">
            <a class="inline-block rounded-lg bg-blue-100 shadow font-medium text-blue-500 py-1 px-3{{ active('home') }}" href="{{ route('home') }}">Featured</a>
        </li>
        <li class="pr-3">
            <a class="inline-block rounded-lg bg-white border border-gray-300 py-1 px-3{{ active('events.index') }}" href="{{ route('events.index') }}">All</a>
        </li>
    </ul>
</nav>
