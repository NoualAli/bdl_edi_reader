@extends('layouts.default')
@section('content')
    @if ($payments->count())
        @include('includes.payments')
    @else
        <div class="notification">
            Aucune données n'est disponible.
        </div>
    @endif
@endsection
