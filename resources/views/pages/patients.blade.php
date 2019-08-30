@extends('master')

@section('navbar')

  @include('layouts.navbar')

@endsection

@section('content')
<div class="row">
  <div class="col-12 col-md-8">
    @include('layouts.list_of_patients')
  </div>

  <div class="col-6 col-md-4">
    @include('layouts.addNewPatient_Form')
    @include('layouts.extendInsurance_Form')
  </div>
</div>
@endsection