<div class="row">
  <table class="table">
    <thead class="bg-info text-white">
      <tr>
        <th scope="col">Препарат</th>
        <th scope="col">Цена</th>
        <th scope="col">Рецепт</th>
      </tr>
    </thead>
    <tbody>@foreach($pills as $pill)
      <tr>
      <td>{{$pill->type}}</td>
      <td>{{$pill->price."$"}}</td>
      <td>{{$pill->about}}</td>
      </tr>@endforeach 
    </tbody>
  </table>
</div>