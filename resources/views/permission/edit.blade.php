@extends('layout.app')
@section('title', 'Edit permission')
@section('description', 'You can edit permission details.')

@section('content')

        @include('errors.list')

        {!! Form::model($permission, ['method' => 'PATCH', 'action' => ['PermissionController@update_permission', $permission->id]]) !!}
            @include('permission._form', ['btnSubmitText' => 'Save',])
        {!! Form::close() !!}

@endsection

@section('js')
    <script type="text/javascript">
        $(function () {

            $(".select2").select2();

        });
    </script>
@endsection