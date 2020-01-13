<!--<div class="mar_from_nav">
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light nav_shadow">
    <a class="navbar-brand" href="/main">
      <img src="/pictures/med_logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Медицинский центр
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @switch($url)
          @case('signin')
          
            @break 
          @case('login')
          
            @break
          @case('patients')
            <li class="nav-item active font-weight-bold">
              <a class="nav-link" href="/patients">Пациенты </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pills">Таблетки</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/incomes">Поступление</a>
            </li>
            @break
          @case('pills')
            <li class="nav-item ">
              <a class="nav-link" href="/patients">Пациенты </a>
            </li>
            <li class="nav-item active font-weight-bold">
              <a class="nav-link" href="/pills">Таблетки</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/incomes">Поступление</a>
            </li>
            @break
          @case('incomes')
            <li class="nav-item">
              <a class="nav-link" href="/patients">Пациенты </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pills">Таблетки</a>
            </li>
            <li class="nav-item active font-weight-bold">
              <a class="nav-link" href="/incomes">Поступление</a>
            </li>
            @break
          @default
            <li class="nav-item">
              <a class="nav-link" href="/patients">Пациенты </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pills">Таблетки</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/incomes">Поступление</a>
            </li>
            @break
        @endswitch
        @if($role=="Глав. Врач")
          @switch($url)
            @case('workers')
              <li class="nav-item active font-weight-bold">
                <a class="nav-link" href="/workers">Сотрудники</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/new">Новые сотрудники</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/fired">Уволеные</a>
              </li>
              @break
            @case('new')
              <li class="nav-item">
                <a class="nav-link" href="/workers">Сотрудники</a>
              </li>
              <li class="nav-item active font-weight-bold">
                <a class="nav-link" href="/new">Новые сотрудники</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/fired">Уволеные</a>
              </li>
              @break
            @case('fired')
              <li class="nav-item">
                <a class="nav-link" href="/workers">Сотрудники</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/new">Новые сотрудники</a>
              </li>
              <li class="nav-item active font-weight-bold">
                <a class="nav-link" href="/fired">Уволеные</a>
              </li>
              @break
            @default
              <li class="nav-item">
                <a class="nav-link" href="/workers">Сотрудники</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/new">Новые сотрудники</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/fired">Уволеные</a>
              </li>
              @break
          @endswitch
        @endif
      </ul>
      <form class="form-inline" method= "GET" action="/find">
        <input class="form-control mr-sm-2" type="search" placeholder="Рег. номер" aria-label="Search" name = "reg_number">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        
      </form>
     <a href="/login" class="btn btn-primary">Выйти</a>
    </div>
  </nav>
 </div> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
     
      <button class="btn btn-outline-success my-2 my-sm-0 mar_r" type="submit">Search</button>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

    </form> 
  </div>
</nav>-->
