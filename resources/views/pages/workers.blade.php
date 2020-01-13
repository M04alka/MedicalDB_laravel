@extends('master')

@section('navbar')

	@include('layouts.navbar.navbar_workers')

@endsection

@section('content')
	
	<div class="row">
		<div class="col-4">
			<p>Сотрудники</p>
			@include('layouts.workers.list_of_workers')
		</div>
		<div class="col-4">
			<p>Уволенные сотрудники</p>
			@include('layouts.fired.fired')
		</div>
		<div class="col-4">
			
			<p>Новые пользователи</p>
			@include('layouts.new.new')
		</div>
	</div>
	@include('messages.errors')
	

@endsection