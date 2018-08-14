@extends('layout.app')
@section('title', 'Profile')
@section('description', 'Make changes to your profile.')

@section('content')

        @include('errors.list')

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update_profile', $user->id]]) !!}
            @include('users._form_profile', ['btnSubmitText' => 'Save'])
        {!! Form::close() !!}

@endsection

@section('js')
    <script type="text/javascript">
        $(function () {

            $(".select2").select2();

        });
    </script>
@endsection