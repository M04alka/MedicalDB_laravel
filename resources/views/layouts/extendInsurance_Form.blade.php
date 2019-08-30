<div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
	<h5 class="card-header">Продлить страховку</h5>
	<div class="card-body">
		<form method="post" action="/insurance/update">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите рег. номер" name="reg_number">
			</div>
			<div class="form-group">
				<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="insurance_type">
					<option selected>Тип страховки</option>
					@foreach($insurances as $insurance)
					<option value="{{$insurance->id}}">{{$insurance->type}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Продлить</button>
			</div>
		</form>
	</div>
</div>