@extends('layouts.default')
@php
if (session()->has('success')) {
    extract(session()->get('success'));
}
@endphp
@section('content')
    <section class="section">
        @if (session()->has('success'))
            <ul class="notification">
                @foreach ($messages as $message)
                    <li class="has-text-success">
                        {{ $message }}
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
@endsection
