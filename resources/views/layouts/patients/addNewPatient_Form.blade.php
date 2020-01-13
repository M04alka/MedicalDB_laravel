<div class="card text-center text-dark mb-3 shadow" style="max-width: 18rem;">
	<h5 class="card-header">Добавить пациента</h5>
	<div class="card-body">
		<form method="post" action="/patients/store">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Имя Фамилия" 
				name="patient_name" required>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Рег. номер" name="reg_number" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Добавить</button>
			</div>
		</form>
	</div>
</div>
    	
