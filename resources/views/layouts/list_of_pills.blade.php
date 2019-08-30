
<table class="table table-bordered shadow">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Пациент</th>
      <th scope="col">Рег. Номер</th>
      <th scope="col">Дата</th>
      <th scope="col">Препарат</th>
      <th scope="col">Количество</th>
      <th scope="col">Доктор</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($sales as $sale)
    <tr>
      <th scope="row">{{$sale->id}}</th>
      <td>{{$sale->patient_name}}</td>
      <td>{{$sale->reg_number}}</td>
      <td>{{$sale->date}}</td>
      <td>{{$sale->type}}</td>
      <td>{{$sale->ammount}}</td>
      <td>{{$sale->d_name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>