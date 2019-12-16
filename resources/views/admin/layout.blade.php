<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'assertchris.io') }}</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @livewireAssets
    </head>
    <body>
        <div class="container mx-auto px-2 mb-32">
            @yield('content')
            <script src="{{ mix('js/app.js') }}"></script>
            @stack('scripts')
        </div>
    </body>
</html>
