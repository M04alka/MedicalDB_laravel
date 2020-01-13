<ul class="list-group">
    @foreach($workers as $worker)
        <div class="card mar_bottom shadow" style="max-width: 24rem;">
            <h5 class="card-header bg-info text-white">Сотрудник : {{$worker->doctor_name}}</h5>
            <div class="card-body">
                <h5 class="card-text">Должность : {{$worker->role_name}}</h5>
                <form method="POST" action="/worker/update">
                    {{ csrf_field() }}
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="role" value="0">
                        <option selected>Должности</option>
                            @foreach($roles as $role)
                                @if($worker->role_name==$role->role_name || $role->role_name== "Новый сотрудник" )
                            
                                @else
                                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endif
                            @endforeach
                    </select>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="reg_number" value="{{$worker->reg_number}}">
                    <input type="submit" name="fire" value="Уволить" class="btn btn-danger">
                    <input type="submit" name="assigne" value="Переназначить" class="btn btn-success">
                </form>
            </div>
        </div>
    @endforeach
</ul>