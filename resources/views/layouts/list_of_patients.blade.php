 <ul class="list-group">
        @foreach($patients_data as $patient_data)
        @if($patient_data->type == "Полицейская")
        <div class="card mar_bottom shadow border-primary">
            <h5 class="card-header bg-primary text-white">Пациент : {{$patient_data->patient_name}} {{$patient_data->reg_number}}</h5>
            <div class="card-body">
                <h5 class="card-text">Страховка : {{$patient_data->type}} 
                  @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </h5>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @elseif($patient_data->type == "Медицинская")
            <div class="card mar_bottom shadow border-danger">
            <h5 class="card-header bg-danger text-white">Пациент : {{$patient_data->patient_name}} {{$patient_data->reg_number}}</h5>
            <div class="card-body">
                <h5 class="card-text">Страховка : {{$patient_data->type}}
                   @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </h5>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @elseif($patient_data->type == "Льготная")
            <div class="card mar_bottom shadow border-warning">
            <h5 class="card-header bg-warning text-darck">Пациент : {{$patient_data->patient_name}} {{$patient_data->reg_number}}</h5>
            <div class="card-body">
                <h5 class="card-text">Страховка : {{$patient_data->type}}
                   @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </h5>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @else
         <div class="card mar_bottom shadow">
            <h5 class="card-header bg-light text-darck">Пациент : {{$patient_data->patient_name}} {{$patient_data->reg_number}}</h5>
            <div class="card-body">
                <h5 class="card-text">Страховка : {{$patient_data->type}}
                   @if($patient_data->is_active == 1) 
                  | Действительна до {{$patient_data->active_to}}
                  @else
                  | Просрочена
                  @endif
                </h5>
                <a href="{{'/patients/'.trim($patient_data->patient_name)}}" class="btn btn-info">Профиль пациента</a>
            </div>
        </div>
        @endif
        @endforeach
    </ul>