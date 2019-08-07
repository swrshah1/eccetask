@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
    <strong>The to-do list item cannot be greater than 255 characters</strong>

    <br><br>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    
@else
<div class="alert">
    <strong>The to-do list item has been stored</strong>
</div>
    
@endif