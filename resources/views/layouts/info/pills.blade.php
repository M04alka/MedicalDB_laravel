<div class="row">
  <table class="table">
    <thead class="bg-info text-white">
      <tr>
        <th scope="col">Препарат</th>
        <th scope="col">Цена</th>
        <th scope="col">Требования</th>
      </tr>
    </thead>
    <tbody>@foreach($pills as $pill)
      <tr>
      <td>{{$pill->pill_name}}</td>
      <td>{{$pill->pill_price."$"}}</td>
      <td>
        @if($pill->pill_recipe) Продаеться только по рецепту!
        @else Продаеться без рецепта.
        @endif
      </td>
      </tr>@endforeach 
    </tbody>
  </table>
</div>