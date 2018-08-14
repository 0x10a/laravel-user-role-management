@extends('layout.app')
@section('title', 'Add Role')
@section('description', 'Add New Role Details, assign permissions from below to this role.')


@section('content')

        @include('errors.list')

        {!! Form::open(['url' => 'add_role']) !!}
            @include('role._form', [
                                            'btnSubmitText' => 'Save',
                                            'CheckedPermissions' => null
                                         ])
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