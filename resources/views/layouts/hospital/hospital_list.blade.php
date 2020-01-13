
<table class="table table-bordered shadow border">
  <thead>
    <tr class="bg-danger">
      <th scope="col">#</th>
      <th scope="col">Пациент</th>
      <th scope="col">Номер паспорта</th>
      <th scope="col">Дата</th>
      <th scope="col">Палата</th>
      <th scope="col">Доктор</th>
      <th scope="col">Выписка</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($hospital_data as $data)
      @if($data->id%2==0)
        <tr table-warning class="incomescolor">
          <th scope="row">{{$hospital_data->id}}</th>
          <td>{{$hospital_data->patient_name}}</td>
          <td>{{$hospital_data->reg_number}}</td>
          <td>{{$hospital_data->date}}</td>
          <td>{{$hospital_data->type}}</td>
          <td>{{$hospital_data->doctor_name}}</td>
          <td></td>
        </tr>
      @else
        <tr table-warning>
          <th scope="row">{{$hospital_data->id}}</th>
          <td>{{$hospital_data->patient_name}}</td>
          <td>{{$hospital_data->reg_number}}</td>
          <td>{{$hospital_data->date}}</td>
          <td>{{$hospital_data->diagnosis}}</td>
          <td>{{$hospital_data->treatment}}</td>
          <td>{{$hospital_data->doctor_name}}</td>
          <td></td>
        </tr>
      @endif
    @endforeach
  </tbody>
</table>