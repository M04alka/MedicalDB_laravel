<div class="card border-success mb-3 shadow mar">
  <div class="card-header bg-transparent border-success">Медикаменты</div>
  <div class="card-body text-success">
    

<div class="row">
@foreach($pills as $pill)
<div class="card border-success mb-3 shadow mar" style="max-width: 18rem;">
  <div class="card-header bg-transparent border-success">{{$pill->type}}</div>
  <div class="card-body text-success">
    <p class="card-text">{{$pill->about}}</p>
  </div>
  <div class="card-footer bg-transparent border-success">{{$pill->price."$"}}</div>
</div>
@endforeach
</div>

  </div>
</div>