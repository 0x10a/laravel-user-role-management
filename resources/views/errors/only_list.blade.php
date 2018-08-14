@if($errors->any())
    <div class="alert alert-danger" id="DPAlert">
        @foreach($errors->all() as $error)
            - {{ $error }}<br>
        @endforeach
    </div>
@endif

