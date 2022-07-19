@extends('layouts.default')

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
    @include('includes.issuer')
    @include('includes.receivers')
@endsection
