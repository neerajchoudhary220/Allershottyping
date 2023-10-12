@extends('aller.layout.base')
@section('master')
    @include('aller.includes.header')

    @include('aller.includes.sidebar')


    <div class="wrapper">
        <div class="content-wrapper">
            @yield('content')
        </div>


        @include('aller.includes.footer')
    </div>
@endsection
