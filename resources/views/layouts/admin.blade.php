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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
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
    <div id="admin">
        <App></App>
    </div>
</body>

</html>
