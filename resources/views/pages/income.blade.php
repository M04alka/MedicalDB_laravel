@extends('master')

@section('navbar')
  
  @include('layouts.navbar.navbar')

@endsection
@section('content')
<div class="row">
	<div class="col-8">
		@include('layouts.income.list_of_income')
	</div>

	<div class="col-4">
		@include('layouts.income.income_Form')
	</div>
</div>
@endsection