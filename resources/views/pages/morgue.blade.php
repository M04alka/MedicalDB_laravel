@extends('master_fluid')

@section('navbar')
  
  @include('layouts.navbar.navbar_morgue')

@endsection
@section('content')
	<div class="row">
		<div class="col-9">
			@include('layouts.morgue.list_of_morgue')
		</div>
		<div class="col-3">
			@if($permissions->add_to_morgue)
				@include('layouts.morgue.morgue_form')
				@include('messages.errors')
			@endif
		</div>
	</div>
@endsection