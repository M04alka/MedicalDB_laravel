 <ul class="list-group">
        @foreach($patientsData as $patient_data)
        @if($patient_data->insurance_type == "Полицейская")
        <div class="card mar_bottom shadow border-primary">
            <h5 class="card-header bg-primary text-white">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
              <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->insurance_type}}
                  @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @elseif(is_null($patient_data->psychological_certificate_id) || is_null($patient_data->medical_certificate_id)) 
                  | Отсутсвуют справки!
                  @elseif(is_null($patient_data->psychological_certificate_id)) 
                  | Отсутсвует справка о психическом здоровьи!
                  @elseif(is_null($patient_data->medical_certificate_id)) 
                  | Отсутсвует справка о здоровьи!
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Профиль пациента</a>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Активировать страховку</a>
            </div>
        </div>
        @elseif($patient_data->insurance_type == "Медицинская")
            <div class="card mar_bottom shadow border-danger">
            <h5 class="card-header bg-danger text-white">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
              <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->insurance_type}} 
                  @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @elseif(is_null($patient_data->psychological_certificate_id) || is_null($patient_data->medical_certificate_id)) 
                  | Отсутсвуют справки!
                  @elseif(is_null($patient_data->psychological_certificate_id)) 
                  | Отсутсвует справка о психическом здоровьи!
                  @elseif(is_null($patient_data->medical_certificate_id)) 
                  | Отсутсвует справка о здоровьи!
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Профиль пациента</a>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Активировать страховку</a>
            </div>
        </div>
        @elseif($patient_data->insurance_type == "Льготная")
            <div class="card mar_bottom shadow border-warning">
            <h5 class="card-header bg-warning text-darck">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
              <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->insurance_type }}
                   @if($patient_data->is_active == 1) 
                  | Действительна до 
                    @php
                      $words = str_ireplace( '-', '.', $patient_data->active_to);
                      $words1 = explode('.',$words);
                      $words2 = array_reverse($words1);
                      echo implode('.',$words2);
                    @endphp
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Профиль пациента</a>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Активировать страховку</a>
            </div>
        </div>
        @else
         <div class="card mar_bottom shadow">
            <h5 class="card-header bg-light text-darck">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->insurance_type }}
                  @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @elseif(is_null($patient_data->psychological_certificate_id) || is_null($patient_data->medical_certificate_id)) 
                  | Отсутсвуют справки!
                  @elseif(is_null($patient_data->psychological_certificate_id)) 
                  | Отсутсвует справка о психическом здоровьи!
                  @elseif(is_null($patient_data->medical_certificate_id)) 
                  | Отсутсвует справка о здоровьи!
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Профиль пациента</a>
                <a href="{{'/patients/'.trim($patient_data->reg_number)}}" class="btn btn-info">Активировать страховку</a>
            </div>
        </div>
        @endif
        @endforeach
    </ul>