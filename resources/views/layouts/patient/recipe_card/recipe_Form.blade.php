@if($permissions->write_recipe)

<div class="card text-center text-white bg-success  mb-3 shadow" style="width: 20rem;">
	<h5 class="card-header">Выписать рецепт</h5>
	<div class="card-body">
		<form method="post" action="/recipe/store">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="hidden" class="form-control" id="inputPassword4" placeholder="Рег. номер" name="reg_number" value="{{$patientData->reg_number}}" readonly>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Диагноз" name="diagnosis">
			</div>
			<div class="form-group">
				<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="type">
					<option selected>Тип таблеток</option>
					@foreach($pills as $pill)
					<option value="{{$pill->id}}">{{$pill->pill_name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Количество таблеток" name="pills_amount">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Количество дней" name="days">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Выписать рецепт</button>
			</div>
		</form>
	</div>
</div>
@endif