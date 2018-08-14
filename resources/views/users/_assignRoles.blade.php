
<div class="row">
    <div class="col-md-12">
        <div class="row" style="margin-top: 3%;">
            <section class="content-header">
                <h1>
                    Assign Roles
                </h1>
            </section>
        </div>

        <div class="row" style="margin-top: 2%;">
            <div class="col-md-1" style="text-align: center; vertical-align: middle; padding: 0.3%">
                {!! Form::checkbox('AllCheck', 1, (count($Roles) == count($CheckedRoles))?true:false, array(
                    'id' => 'AllCheck',
                    'class' => ''
                )) !!}
                <label for="AllCheck">
                    <span></span>
                    <span class="check" data-toggle="tooltip" data-original-title="Un-assign All Sections"></span>
                    <span class="box" data-toggle="tooltip" data-original-title="Assign All Sections"></span>
                </label>
            </div>
            <div class="col-md-10">
                <h4>Roles</h4>
            </div>
        </div>

        <div class="row" style="padding: 1.7%;">
            <div class="col-md-10">
                @foreach($Roles as $role)
                    <div class="form-group">
                        {!! Form::checkbox('Role['.$role->id.']', $role->id, ($CheckedRoles != null)?(array_has($CheckedRoles->keyBy('id')->toArray(), $role->id))?true:false:false, array(
                            'id' => $role->id,
                            'class' => 'roles'
                        )) !!}
                        <label for="{{ $role->id }}">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> {{ $role->display_name }}
                        </label>
                    <div class="form-group">
                @endforeach
            </div>
        </div>
    </div>
</div>