<table class="table table-bordered shadow border">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col">#</th>
      <th scope="col">Пациент</th>
      <th scope="col">Номер паспорта</th>
      <th scope="col">Дата</th>
      <th scope="col">Время смерти</th>
      <th scope="col">Результат вскрытия</th>
      <th scope="col">Доп. информация о трупе</th>
      <th scope="col">Потологоанатом</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($morgueData as $morgue)
      @if($morgue->id%2==0)
        <tr table-warning class="color">
          <th scope="row">{{$loop->index+1}}</th>
          <td>{{$morgue->patient_name}}</td>
          <td>{{$morgue->reg_number}}</td>
          <td>
            @php
              $words = str_ireplace( '-', '.', $morgue->date);
              $words1 = explode('.',$words);
              $words2 = array_reverse($words1);
              echo implode('.',$words2);
            @endphp
          </td>
          <td>{{$morgue->time_of_deth}}</td>
          <td>{{$morgue->autopsy_result}}</td>
          <td>{{$morgue->additional_information}}</td>
          <td>{{$morgue->doctor_name}}</td>
        </tr>
      @else
        <tr table-warning>
          <th scope="row">{{$loop->index+1}}</th>
          <td>{{$morgue->patient_name}}</td>
          <td>{{$morgue->reg_number}}</td>
          <td>
            @php
              $words = str_ireplace( '-', '.', $morgue->date);
              $words1 = explode('.',$words);
              $words2 = array_reverse($words1);
              echo implode('.',$words2);
            @endphp
          </td>
          <td>{{$morgue->time_of_deth}}</td>
          <td>{{$morgue->autopsy_result}}</td>
          <td>{{$morgue->additional_information}}</td>
          <td>{{$morgue->doctor_name}}</td>
        </tr>
      @endif
    @endforeach
  </tbody>
</table>

{{$morgueData->links()}}