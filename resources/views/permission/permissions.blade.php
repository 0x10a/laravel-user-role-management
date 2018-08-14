@extends('layout.app')

@section('title', 'Permissions')
@section('description', 'You can add, edit or delete permissions. Must be done by qualified developer.')


@section('quick')

    <div class="row" style="margin-bottom: 1%;">
        <div class="col-lg-12" style="margin-top: 1%;">
            <a  class="btn btn-info pull-right" data-toggle="tooltip" data-original-title="Add Single Permission" data-placement="left" href="{{ url('add_permission') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Permission</a>
            <a  class="btn btn-success pull-right" data-toggle="tooltip" data-original-title="Add Permissions by Module" data-placement="left" href="{{ url('add_permission_by_module') }}" style="margin-right: 1%"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Permissions By Module</a>
        </div>
    </div>

@endsection

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

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover tblDetails"  cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th >Module</th>
                            <th >Coding Name</th>
                            <th >Display Name</th>
                            <th >Description</th>
                            @if(Auth::user()->can(['edit_permission', 'delete_permission']))
                                <th >Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($AllPermissions as $permission)

                            <tr>
                                <td >{{ $loop->index + 1 }}</td>
                                <td >{{ $permission->module  }}</td>
                                <td >{{ $permission->name  }}</td>
                                <td >{{ $permission->display_name  }}</td>
                                <td >{{ $permission->description  }}</td>

                                @if(Auth::user()->can(['edit_permission', 'delete_permission']))
                                    <td style="text-align: center;">
                                       <span style="margin-left: 5%;">
                                           <a class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Edit Permission Details" data-placement="left" href="{{ 'edit_permission/'.$permission->id }}"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                                       </span>

                                        {{ Form::open(array(
                                                    'action' => ['PermissionController@delete_permission', $permission->id],
                                                    'method' => 'DELETE',
                                                    'style' => 'display:inline'
                                               ))
                                           }}
                                            <span data-toggle="modal" data-target="#confirmDelete" data-title="Delete Permission" data-message="To compeletly remove this permission, also remove its occurrences from code.<br><br>Are you sure you want to delete this permission?" style="margin-left: 5%;">
                                                   <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete Permission" data-placement="left" href="#"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                            </span>
                                        {{ Form::close() }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- /.box-body -->
    </div>

    @include('layout._deleteConfirm')

@endsection

@section('js')
    <script type="text/javascript">
        @include('layout._deleteConfirmJS')
    </script>

@endsection