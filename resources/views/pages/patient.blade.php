@extends('master_fluid')

@section('navbar')

	@include('layouts.navbar.navbar_info')

@endsection

@section('content')

	@include('layouts.patient.patient_card')

@endsection