<ul class="list-group">
	@foreach($fired as $person)
		<div class="card mar_bottom shadow" >
        	<h5 class="card-header bg-light text-darck">{{$fire->d_name}}</h5>
        	<div class="card-body">
        		<h5 class="card-text"></h5>            
       		</div>
    	</div>	
	@endforeach
</ul>
