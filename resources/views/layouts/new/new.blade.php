<ul class="list-group">
    @foreach($new as  $ne)
	   <div class="card mar_bottom shadow" style="max-width: 32rem;" >
            <h5 class="card-header bg-light text-darck">{{$ne->doctor_name}}</h5>
            <div class="card-body">
                <h5 class="card-text"></h5>
                <div class="row">
         	        <form method="POST" action="/new/update" class = "mar_r">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="reg_number" value="{{$ne->reg_number}}">
                        <input type="submit" name="accept" value="Принять" class="btn btn-success">
                    </form>     
                    <form method="POST" action="/new/delete">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="reg_number" value="{{$ne->reg_number}}">
                        <input type="submit" name="delete" value="Удалить" class="btn btn-danger">
                    </form> 
                </div>      
       	    </div>
        </div>	
    @endforeach
</ul>
