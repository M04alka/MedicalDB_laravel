@extends('master')

@section('navbar')
  
  @include('layouts.navbar')

@endsection
@section('content')
<div class="row">
	<div class="col-8">
		
	</div>

	<div class="col-4">
		@include('layouts.pills_Form')
	</div>
</div>
@endsection