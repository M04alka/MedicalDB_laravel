
<div class="card border-success mb-3 shadow mar">
  	<div class="card-header bg-transparent border-success">Типы страхования</div>
  	<div class="card-body text-success">
    	<div class="row">
			@foreach($insurances as $insurance)
				if($insurance->type=="Медицинская" || $insurance->type=="Полицейская" || $insurance->type=="Льготная")

				@elseif($insurance->type!="Медицинская" || $insurance->type!="Полицейская" || $insurance->type!="Льготная")
					<div class="card border-success mb-3 shadow mar" style="max-width: 18rem;">
  						<div class="card-header bg-transparent border-success">
  							{{$insurance->type}}
  						</div>
  						<div class="card-body text-success">
    						<p class="card-text">{{$insurance->about}}</p>
  						</div>
  						<div class="card-footer bg-transparent border-success">
  							{{$insurance->price."$"}}
  						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
