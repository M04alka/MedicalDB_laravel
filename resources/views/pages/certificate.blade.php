@extends('master')

@section('navbar')

	@include('layouts.navbar')

@endsection

@section('content')
 <div class="row">
 	
 	<div class="col-8">
		
	</div>

  	<div class="col-4">
  		@if($role == "Врач" || $role == "Интерн врач" )
  			@include('layouts.med_certificate_Form')
  		@elseif($role == "Психолог" || $role == "Интерн психолог" )
  			@include('layouts.ps_certificate_Form')
  		@elseif($role == "Глав. Врач")
  			@include('layouts.ps_certificate_Form')
  			@include('layouts.med_certificate_Form')
  		@endif
  		@include('messages.errors')
  		
	</div>

<div/>

@endsection
