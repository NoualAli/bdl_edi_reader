@extends('layouts.default')
@php
if (session()->has('success')) {
    extract(session()->get('success'));
}
@endphp
@section('content')
    @if (session()->has('success'))
        <ul class="notification is-success">
            @foreach ($messages as $message)
                <li>
                    {{ $message }}
                </li>
            @endforeach
        </ul>
    @endif
    @if ($payments->count())
        @include('includes.payments')
    @else
        <div class="notification">
            Aucune données n'est disponible.
        </div>
    @endif
@endsection
