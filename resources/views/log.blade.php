@extends('layout.app')

@section('title', 'Log')
@section('description', 'Everything that happens in the system is recorded.')

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible" style="margin-top: 3%;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('status') }}
        </div>
    @endif

    @include('errors.only_list')

    <div class="row">
        <div class="col-md-12" id="SBdy">
            <div class="box" style="margin-top: 1%;">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover tblDetails"  cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th >Operation</th>
                            <th >Performed On</th>
                            <th >Record Id</th>
                            <th >Performed By</th>
                            <th >Performed At</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($log as $item)

                            <tr>
                                <td >{{ $loop->index + 1 }}</td>
                                <td >{{ $item->description  }}</td>
                                <td >{{ $item->subject_type  }}</td>
                                <td >{{ $item->subject_id  }}</td>
                                <td >{{ ($item->causer != null)?$item->causer->name:'-'  }}</td>
                                <td >{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y')  }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- /.box-body -->
    </div>

@endsection

@section('js')
    <script type="text/javascript">

    </script>
@endsection