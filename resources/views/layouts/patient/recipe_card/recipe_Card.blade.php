@foreach($recipes as $recipe) 
<div class="card bg-success text-white mar_bottom shadow" style="width: 20rem;">
  <div class="card-body">
    <h5 class="card-title">Рецепт</h5>
    <p class="card-text">Диагноз : {{$recipe->diagnosis}}</p>
    <p class="card-text">Препарат : {{$recipe->pill_name}}</p>
    <p class="card-text">Количество таблеток : {{$recipe->pills_amount}}</p>
    <p class="card-text">Доктор : {{$recipe->doctor_name}}</p>
  </div>
</div>
@endforeach