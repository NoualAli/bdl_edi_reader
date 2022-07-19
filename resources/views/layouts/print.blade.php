<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html,
        body {
            font-family: sans-serif
        }

        .box {
            background-color: hsl(0deg, 0%, 100%);
            border-radius: 6px;
            box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
            color: hsl(0deg, 0%, 29%);
            display: block;
            padding: 1.25rem;
        }

        .section {
            padding: 3rem 3rem;
        }

        ul {
            list-style: none
        }

        li {
            padding: .5rem 0;
        }

        .has-text-weight-bold {
            font-weight: bold
        }

        .level {
            display: flex;
            gap: 1rem
        }

        .title {
            color: hsl(0deg, 0%, 21%);
            font-size: 2rem;
            font-weight: 600;
            line-height: 1.125;
        }

        hr {
            display: none
        }

        table {
            width: 100% !important;
            margin: 1em 0;
            min-width: 300px;
            color: #2f2f2f;
            overflow: hidden;
            border-collapse: collapse;
        }

        th,
        td {
            border-bottom: 1px solid #711E80;
            display: table-cell;
            text-align: center !important;
            padding: .6em !important;
        }

        th:first-child,
        td:first-child {
            padding-left: 0
        }

        th:last-child,
        td:last-child {
            padding-right: 0
        }

        td:before {
            display: none
        }
    </style>
</head>

<body>
    @yield('content')
    {{-- <main class="section">
    </main> --}}
</body>

</html>
