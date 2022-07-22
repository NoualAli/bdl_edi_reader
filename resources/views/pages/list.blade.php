@extends('layouts.default')
@section('content')
    @include('includes.search-bar')
    @if ($payments->count())
        @include('includes.payments')
    @else
        <div class="notification">
            Aucune données n'est disponible.
        </div>
    @endif
@endsection
