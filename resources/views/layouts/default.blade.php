@php
if (session()->has('success')) {
    extract(session()->get('success'));
}
@endphp
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
        @if (session()->has('success'))
            <ul class="notification is-success">
                @foreach ($messages as $message)
                    <li>
                        {{ $message }}
                    </li>
                @endforeach
            </ul>
        @endif
        @yield('content')
    </main>

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
