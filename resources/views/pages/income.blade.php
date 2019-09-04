@extends('masterfluid')

@section('navbar')
  
  @include('layouts.navbar.navbar')

@endsection
@section('content')
	<div class="row">
		<div class="col-9">
			@include('layouts.income.list_of_income')
		</div>
		<div class="col-3">
			@include('layouts.income.income_Form')
			@include('messages.errors')
		</div>
	</div>
@endsection