<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">
    <title>Remise {{ $payment->discount_reference }}</title>
    <style>
        .page-break {
            page-break-after: auto;
        }

        .box {
            padding: 0;
            border: 1px solid #323232;
            border-radius: 0
        }

        .is-table {
            position: relative;
            display: table;
            margin: .3rem 0;
            width: 100%;
        }

        .is-cell {
            position: relative;
            display: table-cell;
            width: 100%;
        }

        .checkbox {
            vertical-align: middle;
            width: 60px;
            height: 20px;
            border: 2px solid #323232
        }
    </style>
</head>

<body>
    <section class="section">
        <header class="container has-text-centered">
            <img src="{{ public_path('bdl.png') }}" alt="">
        </header>
        <main class="container">
            @yield('content')
        </main>
        <footer class="container pt-1">
            <p class="is-size-7">
                La signature de ce document represente un engagement irrévocable et inconditionnel du client vis-à-vis
                de la
                Banque
                <br>
                Un exemplaire de ce document remis au client ordonnateur
            </p>
        </footer>
    </section>
</body>

</html>
