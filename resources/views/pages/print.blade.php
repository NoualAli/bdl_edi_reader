@extends('layouts.print')

@section('content')
    <div class="level">
        <div class="level-left">
            @include('includes.payment')
        </div>
        <div class="level-right">
            @include('includes.issuer')
        </div>
    </div>
    <div class="page-break"></div>
    @include('includes.receivers')
@endsection
