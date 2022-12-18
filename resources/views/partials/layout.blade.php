<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>
        @include('partials.imports')  
        @vite(['resources/css/main.scss', 'resources/js/main.js'])

        <script>
            window.BASE_URL = `{{ url('/') }}`;
        </script>
    </head>
    <body
        x-data class="bg-[#141414] text-white"
        :class="{'opened-sidenav': $store.sidebar.expanded}"
    >
        @include('partials.navigation')
        <main id="main-content" class="mb-20">
            @yield('content')
        </main>
        @include('partials.footer')
    </body>
</html>