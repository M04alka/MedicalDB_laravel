<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
	<h5 class="card-header">Добавить пациента</h5>
	<div class="card-body">
		<form method="post" action="/patients/store">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Имя Фамилия" 
				name="patient_name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Рег. номер" name="reg_number">
			</div>
			<div class="form-group">
				<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="begin_date">
					<option selected>Дата начала льготы</option>
					@foreach($dates as $date)
					<option value="{{$date}}" >{{$date->day}}.{{$date->month}}.{{$date->year}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Добавить</button>
			</div>
		</form>
	</div>
</div>
    	
