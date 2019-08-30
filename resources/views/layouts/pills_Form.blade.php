<div class="card text-center text-white bg-warning mb-3" style="max-width: 18rem;">
	<h5 class="card-header">Продать таблетки</h5>
	<div class="card-body">
		<form method="post" action="">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Рег. номер" name="reg_number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Количество" name="count">
			</div>
			<div class="form-group">
				<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="insurance_type">
					<option selected>Тип таблеток</option>
					
					<option value=""></option>
					
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-warning text-white">Продать</button>
			</div>
		</form>
	</div>
</div>