@extends('layout.app')
@section('title', 'Add Permission')
@section('description', 'Add New Permission Details, Should be added by developer. Should be added before implementing in code.')


@section('content')

        @include('errors.list')

        {!! Form::open(['url' => 'add_permission']) !!}
            @include('permission._form', [
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