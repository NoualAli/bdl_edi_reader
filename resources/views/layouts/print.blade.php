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

        h1,
        h2 {
            font-weight: 400
        }

        h1 {
            font-size: 18px
        }

        .page-break {
            page-break-after: auto;
        }

        .has-text-centered {
            text-align: center;
        }

        .has-text-left {
            text-align: left;
        }

        .has-text-right {
            text-align: right;
        }

        .container {
            position: relative;
            width: 90%;
            margin: 0 auto;
        }

        .section {
            position: relative;
            padding: 1rem 1rem;
        }

        .box {
            width: 100%;
            height: auto;
            padding: 1rem;
            display: block;
            border: 1px solid #323232
        }

        .is-border-hard {
            border: 2px solid #323232;
        }

        .is-table {
            display: table;
            width: 100%;
        }

        .is-cell {
            display: table-cell;
            width: 100%;
            vertical-align: middle;
        }

        .box.is-cell {
            width: 60px;
        }
    </style>
</head>

<body>
    <section class="section">
        <div class="has-text-centered">
            <img src="{{ public_path('bdl.png') }}" alt="">
        </div>
        <div class="container">
            @yield('content')
        </div>
    </section>
</body>

</html>
