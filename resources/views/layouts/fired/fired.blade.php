<ul class="list-group">
	@foreach($fireDoctors as $person)
		<div class="card mar_bottom shadow" style="max-width: 32rem;" >
        	<h5 class="card-header bg-light text-darck">{{$person->doctor_name}}</h5>
        	<div class="card-body">
        		<h5 class="card-text"></h5>            
        		<form method="POST" action="/restore">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="reg_number" value="{{$person->reg_number}}">
                    <input type="submit" name="restore" value="Востановить" class="btn btn-danger">
                </form>
       		</div>
    	</div>	
	@endforeach
</ul>
