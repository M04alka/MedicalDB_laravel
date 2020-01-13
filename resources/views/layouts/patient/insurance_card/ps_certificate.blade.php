<div class="card text-white bg-primary mb-3 shadow">
 	<div class="card-header">
  		<h5>Психическая справка</h5>
  	</div>
  	<div class="card-body">
    	<h5 class="card-title">Доктор : {{$psyCertificate->doctor_name}}</h5>
    	<p class="card-text">Детали : {{$psyCertificate->details}}</p>
    	<p class="card-text">Дата : 
    		@php
              $words = str_ireplace( '-', '.', $psyCertificate->date);
              $words1 = explode('.',$words);
              $words2 = array_reverse($words1);
              echo implode('.',$words2);
            @endphp
        </p>
  	</div>
</div>
