@extends('layouts.default')
@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="title is-2">Liste des remises</h1>
            <h2 class="subtitle">Total: {{ $payments->count() }}</h2>
        </div>
        <div class="column">
            @include('includes.search-bar')
        </div>
    </div>
    @if ($payments->count())
        @include('includes.payments')
    @else
        <div class="notification">
            Aucune données n'est disponible.
        </div>
    @endif
@endsection
