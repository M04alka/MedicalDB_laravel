<div class="card text-center text-white bg-danger mb-3 shadow" >
	<h5 class="card-header">Постпление</h5>
	<div class="card-body">
		<form method="post" action="/income/store">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Рег. номер" name="reg_number">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Диагноз</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="diagnosis"></textarea>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea2">Лечение</label>
				<textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="treatment"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Оформить</button>
			</div>
		</form>
	</div>
</div>