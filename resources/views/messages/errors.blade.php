@if ($errors->any())
    <div class="alert alert-danger" style="width: 20rem;">
       
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        
    </div>
@endif