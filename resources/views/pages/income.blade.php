@extends('master_fluid')

@section('navbar')
  
  @include('layouts.navbar.navbar_incomes')

@endsection
@section('content')
	<div class="row">
		<div class="col-9">
			@include('layouts.income.list_of_income')
		</div>
		<div class="col-3">
			@include('messages.errors')
			@include('layouts.income.income_Form')
		</div>
	</div>
@endsection