<div class="card text-center text-white bg-dark mb-3 shadow" >
	<h5 class="card-header">Отчет о теле</h5>
	<div class="card-body">
		<form method="post" action="/morgue">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Имя Фамилия" name="patient_name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Номер паспорта" name="reg_number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Время смерти" name="time_of_deth">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea2">Результат вскрытия</label>
				<textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="autopsy_result"></textarea>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea2">Доп. информация о трупе</label>
				<textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="additional_information"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-dark">Оформить</button>
			</div>
		</form>
	</div>
</div>