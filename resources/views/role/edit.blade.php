@extends('layout.app')
@section('title', 'Edit Role')
@section('description', 'You can edit role details.')

@section('content')

        @include('errors.list')

        {!! Form::model($role, ['method' => 'PATCH', 'action' => ['RoleController@update_role', $role->id]]) !!}
            @include('role._form', ['btnSubmitText' => 'Save', 'CheckedPermissions' => $role->perms])
        {!! Form::close() !!}

@endsection

@section('js')

    <script src="{{ asset('js/assign_permission.js?'.time()) }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {

            $(".select2").select2();

        });
    </script>
@endsection