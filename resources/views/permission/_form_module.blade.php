
<div class="form-group" style="padding-top: 2%">
    {!! Form::label('module', 'Module:', ['class' => 'col-lg-2 control-label', 'style' => 'padding-top: 0.5%']) !!}

    <div class="col-lg-4">
        {!! Form::text('module', null, array(
            'id' => 'module',
            'placeholder' => 'Name of the module i.e. permission or users or roles ',
            'required' => true,
            'class' => 'form-control',
            'style' => 'border-radius: 5px'
        )) !!}
    </div>
</div>

{!! Form::hidden('redirects_to', URL::previous()) !!}
<div class="modal-footer" style="margin-top: 3%;">
    <div class="pull-right">
        {!! Form::submit($btnSubmitText, array(
            'id' => 'btnAC',
            'class' => 'btn btn-success form-control'
        )) !!}
    </div>
</div>