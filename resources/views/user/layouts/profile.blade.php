@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/ProfileCustomer.css') }}">
@endsection

@section('content')
@auth
    <div class="layout">

        @include('user.layouts.partials.sideprofile')

        @yield('konten')
        

    </div>
@endauth
@endsection