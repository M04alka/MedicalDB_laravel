<ul class="list-group">
	@foreach($fired as $person)
		<div class="card mar_bottom shadow" >
        	<h5 class="card-header bg-light text-darck">{{$person->doctor_name}}</h5>
        	<div class="card-body">
        		<h5 class="card-text"></h5>            
        		<a href="/restore/{{$person->reg_number}}" class="btn btn-primary">Востановить</a>
       		</div>
    	</div>	
	@endforeach
</ul>
