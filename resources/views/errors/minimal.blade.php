<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex" />

        <title>@yield('title')</title>

        @include('partials.imports')
    </head>
    <body class="h-screen grid place-items-center">
        <div class="text-center">
            <p class="text-9xl text-gray font-bold my-auto mb-5 mt--50">
                @yield('code')
            </p>
            <h1 class="text-3xl font-bold">
                @yield('message')
            </h1>
        </div>
    </body>
</html>
