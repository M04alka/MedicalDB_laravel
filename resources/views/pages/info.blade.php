@extends('master')

@section('navbar')
    @include('layouts.navbar.navbar_info')
@endsection
@section('content')
    @include('layouts.info.insurances')
    @include('layouts.info.pills')
@endsection