@extends('master')

@section('navbar')

	@include('layouts.navbar.navbar')

@endsection

@section('content')
	
	@include('messages.errors')
	@include('layouts.workers.list_of_workers')

@endsection