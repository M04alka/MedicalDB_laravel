<div class="card text-center text-dark bg-default mb-3 shadow" style="max-width: 24rem;">
	<h5 class="card-header">Обновить или добавить препарат</h5>
	<div class="card-body">
		<form method="post" action="/settings/updateorcreatepill">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Название препарата" name="pill_name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="inputPassword4" placeholder="Цена" name="pill_price">
			</div>
			<div class="form-group text-left">		
				<!-- unchecked -->
				<div class="custom-control custom-radio">
  					<input type="radio" class="custom-control-input" id="defaultChecked" name="pill_recipe" value="1" checked>
  					<label class="custom-control-label" for="defaultChecked">Продавать по рецепту</label>
				</div>
				<!-- checked -->
				<div class="custom-control custom-radio">
  					<input type="radio" class="custom-control-input" id="defaultUnChecked" name="pill_recipe" value="0">
  					<label class="custom-control-label" for="defaultUnChecked">Продавать без рецепта</label>
				</div>                  
			</div> 	
			<div class="form-group">
				<button type="submit" class="btn btn-default text-dark">Обработать</button>
			</div>
		</form>
	</div>
</div>
