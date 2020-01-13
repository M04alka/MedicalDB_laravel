<div class="card text-center text-white bg-danger mb-3 shadow">
	<h5 class="card-header">Оформить справку</h5>
	<div class="card-body">
		<form method="post" action="/medcertificate/store">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="hidden" class="form-control" id="inputPassword4" placeholder="Рег. номер" name="reg_number" value="{{$patientData->reg_number}}" readonly>
			</div>
			<div class="form-group">
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="details"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Оформить</button>
			</div>
		</form>
	</div>
</div>