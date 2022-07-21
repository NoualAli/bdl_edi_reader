@php
$payment = $receiver->payment;
@endphp
@extends('layouts.print')

@section('content')
    <h1>{{ $receiver->name }}</h1>
    <h1>{{ $receiver->address . ' ' . $payment->iob }}</h1>
    <h1 class="has-text-centered">VIREMENT PAR SYSTEM ARTS</h1>
    <h2 class="has-text-centered">Ordonateur</h2>
    <h2 class="has-text-right">AGENCE: {{ $receiver->address }}</h2>
    <h2 class="has-text-right">Code: {{ $payment->iob }}</h2>
    @include('includes.print.issuer')
    <br>
    @include('includes.print.payment')
    <br>
    @include('includes.print.receiver')

    @include('includes.print.footer')
@endsection
