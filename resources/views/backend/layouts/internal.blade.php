@extends('layouts.backend')

@section('content')
    @include('backend.components.header')
    @yield('content-internal')
@endsection
