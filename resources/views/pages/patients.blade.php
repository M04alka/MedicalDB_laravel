@extends('master')

@section('navbar')

  @include('layouts.navbar.navbar_patients')

@endsection

@section('content')
	<div class="row">
  	<div class="col-8">
    	@include('layouts.patients.patients_List')
  	</div>
  	<div class="col-4">
  		@include('messages.errors')
    	@include('layouts.patients.addNewPatient_Form')
    	@include('layouts.patients.extendInsurance_Form')
  	</div>
	</div>
@endsection