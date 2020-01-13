<div class="card text-center text-white bg-danger mb-3 shadow" style="width: 20rem;">
	<h5 class="card-header">Оформить пациента</h5>
	<div class="card-body">
		<form method="post" action="/incomes">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Имя Фамилия" name="patient_name" required="true">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Номер паспорта" name="reg_number" required="true">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Оплата" name="payment">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Диагноз</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="diagnosis" required="true"></textarea>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea2">Лечение</label>
				<textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="treatment" required="true"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Оформить</button>
			</div>
		</form>
	</div>
</div>