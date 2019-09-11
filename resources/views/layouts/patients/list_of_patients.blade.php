 <ul class="list-group">
        @foreach($patients_data as $patient_data)
        @if($patient_data->type == "Полицейская")
        <div class="card mar_bottom shadow border-primary">
            <h5 class="card-header bg-primary text-white">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
              <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->type}}
                  @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @elseif($patient_data->type == "Медицинская")
            <div class="card mar_bottom shadow border-danger">
            <h5 class="card-header bg-danger text-white">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
              <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->type}} 
                   @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @elseif($patient_data->type == "Льготная")
            <div class="card mar_bottom shadow border-warning">
            <h5 class="card-header bg-warning text-darck">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
              <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->type}}
                   @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @else
         <div class="card mar_bottom shadow">
            <h5 class="card-header bg-light text-darck">{{$patient_data->patient_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">
                  Номер паспорта : {{$patient_data->reg_number}}
                </h5>
                <p class="card-text">Тип страховки : {{$patient_data->type}}
                   @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </p>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @endif
        @endforeach
    </ul>