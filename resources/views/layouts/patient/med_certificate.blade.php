<div class="card text-white bg-danger mb-3">
  <div class="card-header">
  	<h5>Медицинская справка</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title">Врач : {{$name}}</h5>
    <p class="card-text">Детали : {{$med_cert[0]->details}}</p>
    <p class="card-text">Дата : {{$med_cert[0]->date}}</p>
 </div>
</div>