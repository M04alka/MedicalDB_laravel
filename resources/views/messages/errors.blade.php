@if ($errors->any())
    <div class="alert alert-danger" style="max-width: 18rem;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif