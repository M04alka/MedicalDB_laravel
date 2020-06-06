<ul class="list-group">
    @foreach($patientsData as $patientCard)
        <div class="card mar_bottom shadow">
        	@switch($patientCard->id)
   				@case(1)
        			<h5 class="card-header preferential-bg text-dark">{{$patientCard->patient_name}}</h5>
       				@break
    			@case(2)
        			<h5 class="card-header text-white">{{$patientCard->patient_name}}</h5>
        			@break
        		@case(3)
        			<h5 class="card-header bronze-bg text-dark">{{$patientCard->patient_name}}</h5>
        			@break
        		@case(4)
        			<h5 class="card-header silver-bg text-dark">{{$patientCard->patient_name}}</h5>
        			@break
        		@case(5)
        			<h5 class="card-header gold-bg text-dark">{{$patientCard->patient_name}}</h5>
        			@break
        		@case(6)
        			<h5 class="card-header platinum-bg text-dark">{{$patientCard->patient_name}}</h5>
        			@break
        		@case(7)
        			<h5 class="card-header police-bg text-white">{{$patientCard->patient_name}}</h5>
        			@break
        		@case(8)
        			<h5 class="card-header medical-bg text-white">{{$patientCard->patient_name}}</h5>
        			@break
    			@default
        			<h5 class="card-header bg-primary text-white">{{$patientCard->patient_name}}</h5>
			@endswitch
            <div class="card-body">
            	<h5 class="card-text">
                	Номер паспорта : {{$patientCard->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patientCard->insurance_type}}
                	@if($patientCard->is_active == 1) 
                  	| Действительна до {{$patientCard->active_to}}
                  	@elseif(is_null($patientCard->psychological_certificate_id) || is_null($patientCard->medical_certificate_id)) 
                  	| Отсутсвуют справки!
                  	@elseif(is_null($patientCard->psychological_certificate_id)) 
                  	| Отсутсвует справка о психическом здоровьи!
                  	@elseif(is_null($patientCard->medical_certificate_id)) 
                  	| Отсутсвует справка о здоровьи!
                  	@else
                  	| Просрочена
                  	@endif
                </p>
                <a href="{{'/patients/'.trim($patientCard->reg_number)}}" class="btn btn-info">Профиль пациента</a>
				@if($patientCard->is_active == false)
                	<a href="{{'/insurance/active/'.trim($patientCard->reg_number)}}" class="btn btn-info">Активировать страховку</a>
				@else

				@endif
            </div>
        </div>
    @endforeach
</ul>