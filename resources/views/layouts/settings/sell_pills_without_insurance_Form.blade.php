<div class="card text-center text-dark bg-default mb-3 shadow" style="max-width: 24rem;">
	<h5 class="card-header">Продажа таблеток без страховке</h5>
	<div class="card-body">
		<form method="post" action="/settings/sellpills/store">
			{{ csrf_field() }}
			<div class="form-group text-left">
				@if($settings["sell_pills_without_insurance"] == 0)<p>Сейчас : Отключено </p>
				@else <p>Сейчас : Включено </p>
				@endif
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default text-dark">
					@if($settings["sell_pills_without_insurance"] == 0) Включить 
					@else  Отключить 
					@endif
				</button>
			</div>
		</form>
	</div>
</div>