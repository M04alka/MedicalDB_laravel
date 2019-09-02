<ul class="list-group">
@foreach($new as  $ne)
	<div class="card mar_bottom shadow" >
        <h5 class="card-header bg-light text-darck">{{$ne->doctor_name}}</h5>
        <div class="card-body">
        <h5 class="card-text"></h5>
         	<form method="POST" action="/new/decide">
                 {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="reg_number" value="{{$ne->reg_number}}">
                <input type="submit" name="delete" value="delete" class="btn btn-danger">Удалить
                <input type="submit" name="hire" value="hire" class="btn btn-success">Нанять
            </form>                
       	</div>
    </div>	
@endforeach
</ul>
