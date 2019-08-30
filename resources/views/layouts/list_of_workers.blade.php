<ul class="list-group">
        @foreach($workers as $worker)
        @if($worker->role == "Врач")
        <div class="card mar_bottom">
            <h5 class="card-header bg-danger text-white">Сотрудник : {{$worker->d_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">Должность : {{$worker->role}}</h5>

            </div>
        </div>
        @elseif($worker->role == "Психолог")
            <div class="card mar_bottom">
            <h5 class="card-header bg-primary text-white">Сотрудник : {{$worker->d_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">Должность : {{$worker->role}}</h5>
                <form method="post">
                    <button type="submit" name="delete" class="btn btn-info" >Уволить</button>
                </form>                
            </div>
        </div>
        @elseif($worker->role == "Интерн врач" || $worker->role == "Интерн психолог")
            <div class="card mar_bottom">
            <h5 class="card-header bg-info text-darck">Сотрудник : {{$worker->d_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">Должность : {{$worker->role}}</h5>
                
            </div>
        </div>
        @elseif($worker->role == "Зам Глав. Врача")
            <div class="card mar_bottom">
            <h5 class="card-header bg-success text-darck">Сотрудник : {{$worker->d_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">Должность : {{$worker->role}}</h5>
                
            </div>
        </div>
        @elseif($worker->role == "Парамедик")
            <div class="card mar_bottom">
            <h5 class="card-header bg-primary text-darck">Сотрудник : {{$worker->d_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">Должность : {{$worker->role}}</h5>
                
            </div>
        </div>
        @endif
        @endforeach
    </ul>