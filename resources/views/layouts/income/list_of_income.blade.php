
<table class="table table-bordered shadow">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Пациент</th>
      <th scope="col">Номер паспорта</th>
      <th scope="col">Дата</th>
      <th scope="col">Диагноз</th>
      <th scope="col">Лечение</th>
      <th scope="col">Лечащий врач</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($incomes as $income)
    <tr table-warning>
      <th scope="row">{{$income->id}}</th>
      <td>{{$income->patient_name}}</td>
      <td>{{$income->reg_number}}</td>
      <td>{{$income->date}}</td>
      <td>{{$income->diagnosis}}</td>
      <td>{{$income->treatment}}</td>
      <td>{{$income->doctor_name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>