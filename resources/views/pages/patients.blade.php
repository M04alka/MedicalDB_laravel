@extends('master')

@section('navbar')

  @include('layouts.navbar.navbar')

@endsection

@section('content')
<div class="row">
  <div class="col-12 col-md-8">
    @include('layouts.patients.list_of_patients')
  </div>

  <div class="col-6 col-md-4">
  	@include('messages.errors')
    @include('layouts.patients.addNewPatient_Form')
    @include('layouts.patients.extendInsurance_Form')
  </div>
</div>
@endsection