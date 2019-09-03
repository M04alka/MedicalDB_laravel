@extends('master')

@section('content')
    <div class="row">
    	@include('layouts.signin.signup_Form')
    <div/>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

@endsection