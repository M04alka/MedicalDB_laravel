<div class="card shadow">
  <h5 class="card-header">{{$patientData->patient_name}}</h5>
  <div class="card-body">
    <h5 class="card-title">Рег. номер : {{$patientData->reg_number}}</h5>
    <div class = "row">
    <div class="col-9">
     	@include('layouts.patient.insurance_card.insurance_card') 
      @include('layouts.patient.additional_certificates_card.additional_certificates_card')
    </div>
    <div class="col-3">
     	@include('layouts.patient.recipe_card.recipe_Form')
      @include('layouts.patient.recipe_card.recipe_Card')
    </div>
    </div>
  </div>
</div>