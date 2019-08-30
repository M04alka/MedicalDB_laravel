<ul class="list-group">
        @foreach($sales as $sale)
        <div class="card mar_bottom">
            <h5 class="card-header bg-primary text-white"></h5>
            <div class="card-body">
                <h5 class="card-text">{{$sale->patient_name}} | {{$sale->reg_number}} | {{$sale->date}} | {{$sale->type}} | {{$sale->ammount}} | {{$sale->d_name}}</h5>
               
            </div>
        </div>
        @endforeach
    </ul>