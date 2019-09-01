@extends('master')

@section('navbar')
    @include('layouts.navbar.navbar')
@endsection
@section('content')
    @include('layouts.main.insurances')
    @include('layouts.main.pills')
@endsection