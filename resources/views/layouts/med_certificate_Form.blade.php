<div class="card text-center text-white bg-danger mb-3">
	<h5 class="card-header">Оформить справку</h5>
	<div class="card-body">
		<form method="post" action="/medcertificate/store">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Рег. номер" name="reg_number">
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