@extends('master')

@section('navbar')
    @include('layouts.navbar.navbar_main')
@endsection

@section('content')
	<div class="row">
		<div class="col-4">

		</div>

		<div calss="col-4">
			@include('layouts.login.login_Form')
		</div>

		<div calss="col-4">

		</div>

	</div>

		<div class="row">
		<div class="col-4">

		</div>

		<div calss="col-4">
			@include('messages.errors')
		</div>

		<div calss="col-4">

		</div>
		
	</div>
	
@endsection
