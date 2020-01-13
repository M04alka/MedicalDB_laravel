@extends('master')

@section('navbar')
    @include('layouts.navbar.navbar_main')
@endsection

@section('content')
	<div class="row">
    	@include('layouts.signin.signup_Form')
    	@include('messages.errors')
    <div/>
@endsection