@extends('layout.app')
@section('title', 'Add Permissions by Module')
@section('description', 'Permissions added would be: Show all records of Module, Add new record, edit record, delete record, get record')


@section('content')

        @include('errors.list')

        {!! Form::open(['url' => 'add_permission_by_module']) !!}
            @include('permission._form_module', [
                                            'btnSubmitText' => 'Save'
                                         ])
        {!! Form::close() !!}

@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection