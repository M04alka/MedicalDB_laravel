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
        @if($insurance->insurance_type=="Медицинская" || $insurance->insurance_type=="Полицейская" || $insurance->insurance_type=="Льготная")
        
        @elseif($insurance->insurance_type!="Медицинская" || $insurance->insurance_type!="Полицейская" || $insurance->insurance_type!="Льготная")
          <tr>
            <td>{{$insurance->insurance_type}}</td>
            <td>{{$insurance->insurance_price."$"}}</td>
            <td>{{$insurance->about_insurance}}</td>
          </tr>
        @endif
      @endforeach 
    </tbody>
  </table>	
</div>

