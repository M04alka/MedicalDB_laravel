<div class="card text-center text-dark bg-default mb-3 shadow" style="max-width: 24rem;">
	<h5 class="card-header">Количество таблеток для продажи</h5>
	<div class="card-body">
		<form method="post" action="/settings/pillscount/store">
			{{ csrf_field() }}
			<div class="form-group text-left">
				<p>Сейчас : {{$settings["pills_count"]}}</p>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Количество таблеток" name="pills_count">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default text-dark">Установить</button>
			</div>
		</form>
	</div>
</div>