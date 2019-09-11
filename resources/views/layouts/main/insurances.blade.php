
<div class="row">
		
					
 <table class="table">
          <thead class="bg-info text-white">
            <tr>
              <th scope="col">Тип страхования</th>
              <th scope="col">Цена</th>
              <th scope="col">Описание</th>
            </tr>
          </thead>
          <tbody>
            @foreach($insurances as $insurance)
            @if($insurance->type=="Медицинская" || $insurance->type=="Полицейская" || $insurance->type=="Льготная")

        @elseif($insurance->type!="Медицинская" || $insurance->type!="Полицейская" || $insurance->type!="Льготная")
            <tr>
              <td>{{$insurance->type}}</td>
              <td>{{$insurance->price."$"}}</td>
              <td>{{$insurance->about}}</td>
            </tr>
  @endif
            @endforeach 
          </tbody>
        </table>	
		</div>

