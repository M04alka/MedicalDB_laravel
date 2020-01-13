<div class="card mar_bottom shadow">
  <h5 class="card-header">{{$patientData->insurance_type}} cтраховка</h5>
  <div class="card-body">
  	<div class="row" >
    <div class="col-6">
        @if(is_null($patientData->medical_certificate_id) &&  $permissions->write_med_certificates!=true)
            <div class="alert alert-danger" role="alert">
                Медицинская справка отсутсвует!
            </div>
        @elseif(is_null($patientData->medical_certificate_id) && $permissions->write_med_certificates==true)
            @include('layouts.patient.insurance_card.med_certificate_Form')
        @else
            @include('layouts.patient.insurance_card.med_certificate')
        @endif
    </div>
    <div class="col-6">
        @if(is_null($patientData->psychological_certificate_id) && $permissions->write_psy_certificates!=true)
            <div class="alert alert-danger" role="alert">
                Психическая справка отсутсвует!
            </div>
        @elseif(is_null($patientData->psychological_certificate_id) && $permissions->write_psy_certificates==true)
            @include('layouts.patient.insurance_card.ps_certificate_Form')
        @else
            @include('layouts.patient.insurance_card.ps_certificate')
        @endif
    </div>
</div>
  </div>
</div>