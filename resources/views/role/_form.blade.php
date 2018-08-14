
<div class="form-group" style="padding-top: 2%">
    {!! Form::label('name', 'Coding Name:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-4">
        {!! Form::text('name', null, array(
            'id' => 'name',
            'placeholder' => 'Name to be used in coding i.e. add_permission',
            'required' => true,
            'class' => 'form-control',
            'style' => 'border-radius: 5px'
        )) !!}
    </div>

    {!! Form::label('display_name', 'Display Name:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-4">
        {!! Form::text('display_name', null, array(
            'id' => 'display_name',
            'placeholder' => 'Name for users i.e. Add Permission',
            'required' => true,
            'class' => 'form-control',
            'style' => 'border-radius: 5px'
        )) !!}
    </div>
</div>
<div class="form-group" style="padding-top: 2%">
    {!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-10">
        {!! Form::text('description', null, array(
            'id' => 'description',
            'placeholder' => 'Some detail about this permission',
            'class' => 'form-control',
            'style' => 'border-radius: 5px'
        )) !!}
    </div>
</div>

{!! Form::hidden('redirects_to', URL::previous()) !!}

@include('role._assignPermissions')

<div class="modal-footer" style="margin-top: -5%">
    <div class="pull-right">
        {!! Form::submit($btnSubmitText, array(
            'id' => 'btnAC',
            'class' => 'btn btn-success form-control'
        )) !!}
    </div>
</div>


