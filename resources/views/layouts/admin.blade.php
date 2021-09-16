<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Animate On Scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <script>
        var APP = {};
        APP.APP_URL = '{{ config('app.url') }}';
        @php
        $user = Auth::user();
        @endphp
        APP.USER = {!! json_encode($user, true) !!};
    </script>
</head>

<body>
   dsfasdfsdfsfsadfds
    <div id="admin">
        <App></App>
    </div>

    {{-- AOS Script --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap');

        #admin {
            font-family: 'Raleway', sans-serif;
        }

    </style>
</body>

</html>
