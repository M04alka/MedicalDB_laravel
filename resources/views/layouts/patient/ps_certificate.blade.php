<div class="card text-white bg-primary mb-3">
 	<div class="card-header">
  		<h5>Психическая справка</h5>
  	</div>
  	<div class="card-body">
    	<h5 class="card-title">{{$name}}</h5>
    	<p class="card-text">Детали : {{$psy_cert[0]->details}}</p>
    	<p class="card-text">Дата : {{$psy_cert[0]->date}}</p>
  	</div>
</div>
