@extends('layout.app')

@section('title', 'Users')
@section('description', 'You can add, edit or delete users. You can also change roles.')

@section('quick')

    <div class="row" style="margin-bottom: 1%;">
        <div class="col-lg-12" style="margin-top: 1%;">
            <a  class="btn btn-info pull-right" data-toggle="tooltip" data-original-title="Add User" data-placement="left" href="{{ url('add_user') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;User</a>
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
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover tblDetails"  cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Role</th>
                            <th >Member Since</th>
                            <th >Last Login</th>
                            @if(Auth::user()->can(['edit_users', 'delete_users']))
                                <th >Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td >{{ $loop->index + 1 }}</td>
                                <td >{{ $user->name  }}</td>
                                <td >{{ $user->email  }}</td>
                                <td >
                                    @foreach ($user->roles as $role)
                                        {{ $role->display_name }}{{ (($loop->index + 1) < count($user->roles))?',':'' }}
                                    @endforeach
                                </td>
                                <td >{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y')  }}</td>
                                <td >{{ ($user->last_login != null || $user->last_login != '' || $user->last_login != 0)?\Carbon\Carbon::parse(date('Y-m-d H:i:s', $user->last_login))->format('M d, Y h:i A') : '-' }}</td>

                                @if(Auth::user()->can(['edit_users', 'delete_users']))
                                    <td style="text-align: center;">
                                           <span style="margin-left: 5%;">
                                               <a class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Edit User Details" data-placement="left" href="{{ 'edit_user/'.$user->id }}"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                                           </span>

                                        {{ Form::open(array(
                                                    'action' => ['UserController@delete_user', $user->id],
                                                    'method' => 'DELETE',
                                                    'style' => 'display:inline'
                                               ))
                                           }}
                                        <span data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user?" style="margin-left: 5%;">
                                                       <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete User" data-placement="left" href="#"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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