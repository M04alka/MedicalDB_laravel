
<div class="card shadow">
  <h5 class="card-header">{{$patient_data->patient_name}}</h5>
  <div class="card-body">
    <h5 class="card-title">Мед карта</h5>
    <p class="card-text">Рег. номер : {{$patient_data->reg_number}}</p>
    <div class="card border-dark">
      <h5 class="card-header border-dark">{{$patient_data->type}} cтраховка</h5>
      <div class="card-body">
        <div class = "row"> 
          @if($patient_data->type!="Льготная")
            <div class="col-6">
              @if(is_null($patient_data->medical_certificate_id) && $role!="Врач")
                <div class="alert alert-danger" role="alert">
                  Медицинская справка отсутсвует!
                </div>
              @elseif(is_null($patient_data->medical_certificate_id) && $role=="Врач")
                @include('layouts.patient.med_certificate_Form')
              @else
                @include('layouts.patient.med_certificate')
              @endif
            </div>
            <div class="col-6">
              @if(is_null($patient_data->psychological_certificate_id) && $role!="Психолог")
                <div class="alert alert-danger" role="alert">
                  Психическая справка отсутсвует!
                </div>
              @elseif(is_null($patient_data->psychological_certificate_id) && $role=="Психолог")
                @include('layouts.patient.ps_certificate_Form')
              @else
                @include('layouts.patient.ps_certificate')
              @endif
            </div>
          @else
            <div class="col-6">
              <div class="alert alert-success" role="alert">
                Медицинская справка не требуеться!
              </div>
            </div>
            <div class="col-6">
              <div class="alert alert-success" role="alert">
                Психологическая справка не требуеться!
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>