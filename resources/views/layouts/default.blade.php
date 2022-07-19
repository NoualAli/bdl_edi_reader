<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>BDL EDI</title>
</head>

<body>
    @include('includes.navbar')
    @include('includes.upload')
    <main class="section">
        @yield('content')
    </main>

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
