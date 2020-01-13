<div class="card text-white bg-danger mb-3 shadow">
 	<div class="card-header">
  		<h5>Медицинская справка</h5>
  	</div>
  	<div class="card-body">
    	<h5 class="card-title">Доктор : {{$medCertificate->doctor_name}}</h5>
    	<p class="card-text">Детали : {{$medCertificate->details}}</p>
    	<p class="card-text">Дата : 
    		@php
              $words = str_ireplace( '-', '.', $medCertificate->date);
              $words1 = explode('.',$words);
              $words2 = array_reverse($words1);
              echo implode('.',$words2);
            @endphp
        </p>
 	</div>
</div>