<div class="card mar_bottom shadow">
  <h5 class="card-header">Дополнительные справки</h5>
  <div class="card-body">
  	<div class="row" >
    <div class="col-6">
        @if(is_null($drivingCertificate) && $permissions->write_psy_certificates!=true)
            <div class="alert alert-danger" role="alert">
                Cправка для водительской лицензии отсутсвует!
            </div>
        @elseif(is_null($patientData->psychological_certificate_id) && $permissions->write_psy_certificates==true)
           @include('layouts.patient.additional_certificates_card.driving_cert_card.driving_certificate_Form')
        @else
            @include('layouts.patient.additional_certificates_card.driving_cert_card.driving_certificate_Card')
        @endif
    </div>
    <div class="col-6">
        @if(is_null($weaponCertificate) && $permissions->write_psy_certificates!=true)
            <div class="alert alert-danger" role="alert">
                Cправка для владения оружием отсутсвует!
            </div>
        @elseif(is_null($patientData->psychological_certificate_id) && $permissions->write_psy_certificates==true)
            @include('layouts.patient.additional_certificates_card.weapon_cert_card.weapon_certificate_Form')
        @else
            @include('layouts.patient.additional_certificates_card.weapon_cert_card.weapon_certificate_Card')
        @endif
    </div>
</div>		
  </div>
</div>