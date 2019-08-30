<div class="col-3">
</div>

<div class="col-6">
<div class="card text-center mar_from_nav">
  <h5 class="card-header">Войти</h5>
  <div class="card-body">
    <form method="post" action="\login" >
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleInputEmail1">Имя Фамилия</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Имя Фамилия" name="d_name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" name="password">
      </div>
      <div class="raw" >
        <button type="submit" class="btn btn-primary">Войти</button>
      </div>
  </div>
  <div class="card-footer text-muted">
    <a href="/signin">Создать акаунт</a>
  </div>
</div>
</div>

<div class="col-3">
</div>