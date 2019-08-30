@extends('master')

@section('navbar')
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
   	<a class="navbar-brand" href="#"></a>
   	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   		<span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Пациенты<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Таблетки</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Рег. номер" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
   </nav>

@endsection
@section('content')
    
    <form method="post" action="">
    	<div class="row">
    		<div class="col-md-7">
    			<input type="text" class="form-control" placeholder="Имя Фамилия" name="name">
    		</div>
    		<div class="col">
    			<input type="text" class="form-control" placeholder="Рег. номер" name="reg_number">
    		</div>
    		<div class="col">
    			<button type="submit" class="btn btn-primary">Создать</button>
    		</div>
    	</div>
    </form>

    @include('layouts.dblist')

@endsection