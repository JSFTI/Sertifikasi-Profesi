<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if (isset($metas) && count($metas) > 0)
            @foreach ($metas as $name => $content)
                <meta name="{{ $name }}" content="{{ $content }}" />
            @endforeach
        @endif

        <script>
            window.BASE_URL = `{{ url('/') }}`;
            window.BASE_API_URL = `{{ url('/api') }}`;
        </script>

        <title>{{ $title ?? config('app.name') }}</title>
        @include('partials.imports')
        @vite(['resources/css/main.scss', 'resources/js/main.js'])
    </head>
    <body
        x-data class="bg-[#141414] text-white"
        :class="{'opened-sidenav': $store.sidebar.expanded}"
    >
        @include('partials.navigation')
        <main
            id="main-content" class="mb-20"
            @@click="handleClickedOverlay"
        >
            @yield('content')
        </main>
        @include('partials.footer')
    </body>
</html>
