@extends('layouts\navbar\navbar_main')

  @section('list_of_links')
  
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="/patients">Пациенты </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pills">Таблетки</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/incomes">База данных</a>
      </li>
      <li class="nav-item active font-weight-bold">
        <a class="nav-link" href="/morgue">Морг</a>
      </li>
      @include('layouts\navbar\admin_tabs')

    </ul>

  @endsection

  @section('search_form')

    @include('layouts\navbar\search_form')

  @endsection