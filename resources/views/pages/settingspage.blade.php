@extends('master')

@section('navbar')
    @include('layouts.navbar.navbar_settings')
@endsection
@section('content')

	<div class="row">
		<div class="col-4">
			@include('layouts.settings.pills_count_form')
    		@include('layouts.settings.sell_pills_without_insurance_Form')
    		@include('layouts.settings.insurance_auto_active_Form')
		</div>
		<div class="col-4">
			@include('layouts.settings.update_or_create_pill_Form')
		</div>
		<div class="col-4">
			@include('layouts.settings.update_or_create_role_Form')
		</div>
	</div>
   
   
@endsection