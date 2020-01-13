<div class="card text-center text-dark mb-3 shadow" style="max-width: 18rem;">
	<h5 class="card-header">Продлить страховку</h5>
	<div class="card-body">
		<form method="post" action="/insurance/update">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите рег. номер" name="reg_number" required>
			</div>
			<div class="form-group">
				<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="insurance_type">
					<option selected>Тип страховки</option>
					@foreach($insurances as $insurance)
					@if($insurance->insurance_type  == "Льготная")
					
					@else
					<option value="{{$insurance->id}}">{{$insurance->insurance_type}}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Продлить</button>
			</div>
		</form>
	</div>
</div>