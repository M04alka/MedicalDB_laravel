@extends('master')

@section('navbar')
  
  @include('layouts.navbar.navbar_hospital')

@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			@include('layouts.hospital.hospital_list')
		</div>
	</div>
@endsection