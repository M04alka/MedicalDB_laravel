@extends('master')

@section('navbar')
  
  @include('layouts.navbar.navbar_pills')

@endsection
@section('content')
	<div class="row">
		<div class="col-8">
			@include('layouts.pills.list_of_pills')
		</div>
		<div class="col-4">
			@include('layouts.pills.pills_Form')
			@include('messages.errors')
		</div>
	</div>
@endsection