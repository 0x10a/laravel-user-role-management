@extends('layout.app')
@section('title', 'Edit User')
@section('description', 'Edit User and change their roles')

@section('content')

        @include('errors.list')

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update_user', $user->id]]) !!}
            @include('users._form', ['btnSubmitText' => 'Save', 'CheckedRoles' => $user->roles])
        {!! Form::close() !!}

@endsection

@section('js')
    <script src="{{ asset('js/assign_role.js?'.time()) }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {

            $(".select2").select2();

        });
    </script>
@endsection