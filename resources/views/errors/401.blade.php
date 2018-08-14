@extends('layout.app')


@section('title', '401 Unauthorized')
@section('description', '')

@section('quick')



@endsection

@section('content')
    <div class="error-page">
        <h2 class="headline text-yellow"> 401</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Unauthorized.</h3>

            <p>
                You are not authorized to view this page.
                Meanwhile, you may <a href="{{ url('/') }}">return to dashboard</a>
            </p>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
@endsection


@section('js')
    <script type="text/javascript">
    </script>
@endsection