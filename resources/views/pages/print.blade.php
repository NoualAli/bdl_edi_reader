@php
$payment = $receiver->payment;
@endphp
@extends('layouts.print')

@section('content')
    <h1>AGENCE {{ $receiver->address . ' ' . $payment->iob }}</h1>
    <h1 class="has-text-centered">VIREMENT PAR SYSTEM ARTS</h1>
    <h2 class="has-text-centered">Ordonateur</h2>
    <h2 class="has-text-right">AGENCE: {{ $receiver->address }}</h2>
    <h2 class="has-text-right">Code: {{ $payment->iob }}</h2>
    <h1>Client Ordonnateur</h1>
    <div class="box">
        <div class="is-table">
            <div class="is-cell">
                <div class="is-table">
                    <p class="is-cell">
                        personne physique
                    </p>
                    <div class="box is-border-hard is-cell"></div>
                </div>
            </div>
            <div class="is-cell">
                <div class="is-table">
                    <p class="is-cell">
                        personne moral
                    </p>
                    <div class="box is-border-hard is-cell"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
