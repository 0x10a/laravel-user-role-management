@extends('layout.app')
@section('title', 'Add User')
@section('description', 'Add New user Details, assign roles from below to this user.')


@section('content')

        @include('errors.list')

        {!! Form::open(['url' => 'add_user']) !!}
            @include('users._form', [
                                            'btnSubmitText' => 'Save',
                                            'CheckedRoles' => null
                                         ])
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