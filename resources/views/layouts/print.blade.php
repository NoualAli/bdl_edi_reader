<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Remise {{ $payment->discount_reference }}</title>
    <style>
        html,
        body {
            font-family: sans-serif;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            margin-top: 20px;
            font-size: 12px;
        }

        .page-break {
            page-break-after: auto;
        }

        .box {
            background-color: #fcfcfc;
            border-radius: 6px;
            box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
            color: #353535;
            display: inline-block;
            padding: 1.25rem;
            border: 1px solid #353535;
            min-width: 90%;
            width: auto;
        }

        .section {
            padding: 1rem 1rem;
        }

        ul {
            list-style: none
        }

        .has-text-weight-bold {
            font-weight: bold
        }

        .level {
            display: table;
            position: relative;
            width: 100%;
        }

        .level-left,
        .level-right {
            display: table-cell;
            width: 100%;
        }

        .title {
            display: block;
            color: #353535;
            font-weight: 600;
        }

        hr {
            color: #fcfcfc;
        }

        table {
            margin: 1em auto;
            color: #2f2f2f;
            border-collapse: collapse;
        }

        th,
        td {
            border-bottom: 1px solid #711E80;
            display: table-cell;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="section">
        @yield('content')
    </section>
</body>

</html>
