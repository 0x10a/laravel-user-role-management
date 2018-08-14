
<div class="form-group" style="padding-top: 2%">
    {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-4">
        {!! Form::text('name', null, array(
            'id' => 'name',
            'placeholder' => 'Name',
            'required' => true,
            'class' => 'form-control',
            'style' => 'border-radius: 5px'
        )) !!}
    </div>

    {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-4">
        {!! Form::email('email', null, array(
            'id' => 'email',
            'placeholder' => 'Email',
            'required' => true,
            'class' => 'form-control',
            'style' => 'border-radius: 5px'
        )) !!}
    </div>
</div>
<div class="form-group" style="padding-top: 2%">
    {!! Form::label('password', 'New Password:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-4">
        <input type="password" name="password" minlength="8" class="form-control" id="password" value="" placeholder="Min 8 Characters" style="border-radius: 5px">
    </div>

    {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-4">
        <input type="password" name="password_confirmation" minlength="8" class="form-control" id="password_confirmation" value="" placeholder="Min 8 Characters" style="border-radius: 5px">
    </div>
</div>

{!! Form::hidden('redirects_to', URL::previous()) !!}

@include('users._assignRoles')

<div class="modal-footer" style="margin-top: -5%;">
    <div class="pull-right">
        {!! Form::submit($btnSubmitText, array(
            'id' => 'btnAC',
            'class' => 'btn btn-success form-control'
        )) !!}
    </div>
</div>