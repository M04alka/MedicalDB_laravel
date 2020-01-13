@extends('layouts\navbar\navbar_main')

  @section('list_of_links')
  
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Личный кабинет</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/patients">Пациенты</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pills">Таблетки</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/incomes">Поступление</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/morgue">Морг</a>
      </li>
      
    	<li class="nav-item ">
    		<a class="nav-link" href="/workers">Сотрудники</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" href="/new">Новые сотрудники</a>
  		</li>
  		<li class="nav-item active font-weight-bold">
    		<a class="nav-link" href="/fired">Уволеные</a>
  		</li>

    </ul>

  @endsection

  @section('search_form')

    @include('layouts\navbar\search_form')

  @endsection