@if($errors->any())
    <div class="alert alert-danger" id="DPAlert">
        <strong>UH-OH!!!</strong> something went wrong...<br>
        @foreach($errors->all() as $error)
            <br>- {{ $error }}
        @endforeach
    </div>
@endif

