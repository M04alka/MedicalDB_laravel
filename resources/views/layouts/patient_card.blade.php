
<div class="card shadow">
  <h5 class="card-header">{{$patient_data[0]->patient_name}}</h5>
  <div class="card-body">
    <h5 class="card-title">Мед карта</h5>
    <p class="card-text">Рег. номер : {{$patient_data[0]->reg_number}}</p>
    
<div class="card border-dark">
  <h5 class="card-header border-dark">{{$patient_data[0]->type}} cтраховка</h5>
  <div class="card-body">

<div class = "row">

@if($patient_data[0]->type!="Льготная")

<div class="col-6">
  @if(is_null($patient_data[0]->medical_certificate_id) && $role!="Врач")
    <div class="alert alert-danger" role="alert">
    Медицинская справка отсутсвует!
    </div>
  @elseif(is_null($patient_data[0]->medical_certificate_id) && $role=="Врач")
    @include('layouts.med_certificate_Form')
  @else
    @include('layouts.med_certificate')
  @endif
</div>

<div class="col-6">
  @if(is_null($patient_data[0]->psychological_certificate_id) && $role!="Психолог")
    <div class="alert alert-danger" role="alert">
    Психологическая справка отсутсвует!
    </div>
  @elseif(is_null($patient_data[0]->psychological_certificate_id) && $role=="Психолог")
    @include('layouts.ps_certificate_Form')
  @else
    @include('layouts.ps_certificate')
  @endif
</div>

@endif
</div>

</div>
</div>

  </div>
</div>