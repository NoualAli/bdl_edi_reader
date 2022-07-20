@extends('layouts.default')

@section('content')
    <div class="columns">
        <div class="column">
            @include('includes.payment')
        </div>
        <div class="column">
            @include('includes.issuer')
        </div>
    </div>
    @include('includes.receivers')
@endsection
