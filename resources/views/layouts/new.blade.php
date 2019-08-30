<ul class="list-group">
@foreach($new as  $ne)
	<div class="card mar_bottom shadow" >
        <h5 class="card-header bg-light text-darck">{{$ne->d_name}}</h5>
        <div class="card-body">
        <h5 class="card-text"></h5>
         	<form method="post">
                <button type="submit" name="delete" class="btn btn-danger">Удалить</button>
                <button type="submit" name="delete" class="btn btn-success">Нанять</button>
            </form>                
       	</div>
    </div>	
@endforeach
</ul>
