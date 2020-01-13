@extends('layouts\navbar\navbar_main')

@if(!empty($role))
	@section('list_of_links')
  
    	<ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Личный кабинет</a>
          </li>
      		<li class="nav-item">
        		<a class="nav-link" href="/patients">Пациенты </a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="/pills">Таблетки</a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="/incomes">Поступление</a>
      		</li>
          <li class="nav-item">
            <a class="nav-link" href="/morgue">Морг</a>
          </li>
    

    	</ul>

  @endsection

   @section('search_form')

    @include('layouts\navbar\search_form')

  @endsection

@else

  @section('search_form')

    @include('layouts\navbar\login_signin_links')

  @endsection

@endif
