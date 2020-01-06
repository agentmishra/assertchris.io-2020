<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'assertchris.io') }}</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('css/highlight.css') }}" rel="stylesheet">
        @include('feed::links')
        @livewireAssets
    </head>
    <body class="py-8 md:py-16 lg:py-32">
        <div class="container max-w-4xl mx-auto px-2 text-gray-700 text-lg font-light">
            <nav
                class="
                    flex flex-row items-center justify-between px-4
                    @if(request()->is('/'))
                        mb-8
                    @else
                        mb-4
                    @endif
                "
            >
                <div class="flex flex-row items-center justify-start">
                    @if(request()->is('/'))
                        <h1 class="flex text-3xl">Christopher Pitt</h1>
                    @else
                        <span class="flex text-2xl">Christopher Pitt</span>
                    @endif
                    @if(!request()->is('/'))
                        <a href="{{ route('show-home') }}" class="flex text-md text-blue-500 underline ml-2">Home</a>
                    @endif
                </div>
                <div class="flex flex-row items-center justify-start">
                    <a href="https://twitter.com/assertchris" class="inline-flex w-4 h-4 text-blue-400">
                        @icon('brands.twitter')
                    </a>
                    <a href="https://github.com/assertchris" class="inline-flex w-4 h-4 text-blue-400 ml-2">
                        @icon('brands.github')
                    </a>
                    <a href="{{ route('feeds.main') }}" class="inline-flex w-4 h-4 text-blue-400 ml-2">
                        @icon('solid.rss')
                    </a>
                </div>
            </nav>
            @yield('content')
            <script src="{{ mix('js/app.js') }}"></script>
            @stack('scripts')
        </div>
    </body>
</html>
