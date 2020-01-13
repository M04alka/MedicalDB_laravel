
<table class="table table-bordered shadow">
  <thead>
    <tr class = "bg-warning">
      <th scope="col">#</th>
      <th scope="col">Пациент</th>
      <th scope="col">Номер паспорта</th>
      <th scope="col">Дата продажи</th>
      <th scope="col">Препарат</th>
      <th scope="col">Количество</th>
      <th scope="col">Доктор</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($sales as $sale)
    @if($sale->id%2==0)
    <tr table-warning class = "pillscolor">
      <th scope="row">{{$sale->id}}</th>
      <td>{{$sale->patient_name}}</td>
      <td>{{$sale->reg_number}}</td>
      <td>
        @php
          $words = str_ireplace( '-', '.', $sale->date);
          $words1 = explode('.',$words);
          $words2 = array_reverse($words1);
          echo implode('.',$words2);
        @endphp
      </td>
      <td>{{$sale->type}}</td>
      <td>{{$sale->ammount}}</td>
      <td>{{$sale->doctor_name}}</td>
    </tr>
    @else
    <tr table-warning>
      <th scope="row">{{$sale->id}}</th>
      <td>{{$sale->patient_name}}</td>
      <td>{{$sale->reg_number}}</td>
      <td>
        @php
          $words = str_ireplace( '-', '.', $sale->date);
          $words1 = explode('.',$words);
          $words2 = array_reverse($words1);
          echo implode('.',$words2);
        @endphp
      </td>
      <td>{{$sale->type}}</td>
      <td>{{$sale->ammount}}</td>
      <td>{{$sale->doctor_name}}</td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

{{ $sales->onEachSide(3)->links() }}
