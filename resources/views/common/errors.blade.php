@if (count($errors))
<!-- Form Error List -->
<div class="alert alert-danger">
    <strong>There was an error trying to store your to-do list item:</strong>

    <br><br>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>    
@endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif