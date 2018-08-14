@extends('layout.app')

@section('title', 'Roles')
@section('description', 'You can add, edit or delete roles based on the permissions.')


@section('quick')

    <div class="row" style="margin-bottom: 1%;">
        <div class="col-lg-12" style="margin-top: 1%;">
            <a  class="btn btn-info pull-right" data-toggle="tooltip" data-original-title="Add Role" data-placement="left" href="{{ url('add_role') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Role</a>
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
                            <th >Coding Name</th>
                            <th >Display Name</th>
                            <th >Description</th>
                            @if(Auth::user()->can(['edit_role', 'delete_role']))
                                <th >Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($AllRoles as $role)

                            <tr>
                                <td >{{ $loop->index + 1 }}</td>
                                <td >{{ $role->name  }}</td>
                                <td >{{ $role->display_name  }}</td>
                                <td >{{ $role->description  }}</td>

                                @if(Auth::user()->can(['edit_role', 'delete_role']))
                                    <td style="text-align: center;">
                                       <span style="margin-left: 5%;">
                                           <a class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Edit Role Details" data-placement="left" href="{{ 'edit_role/'.$role->id }}"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                                       </span>

                                        {{ Form::open(array(
                                                    'action' => ['RoleController@delete_role', $role->id],
                                                    'method' => 'DELETE',
                                                    'style' => 'display:inline'
                                               ))
                                           }}
                                            <span data-toggle="modal" data-target="#confirmDelete" data-title="Delete Role" data-message="Are you sure you want to delete this role?" style="margin-left: 5%;">
                                                   <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete Role" data-placement="left" href="#"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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