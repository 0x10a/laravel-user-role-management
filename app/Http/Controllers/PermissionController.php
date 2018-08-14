<?php

namespace URM\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use URM\Permission;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->can('view_permission')){

            $AllPermissions = Permission::all();

            return view('permission.permissions', compact('AllPermissions'));
        }
        else{
            return view('errors.401');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_permission() {
        if(Auth::user()->can('add_permission')) {
            return view('permission.create');
        }
        else
            return view('errors.401');
    }

    public function store_permission(Request $request)
    {
        if(Auth::user()->can('add_permission')){
            $this->validate($request, [
                'name' => 'required|min:2',
                'display_name' => 'required|min:2',
                'module' => 'required|min:2',
            ],
                [
                    'name.required' => 'Name, which is to be used in coding, is required.',
                    'display_name.required' => 'Display Name is required.',
                    'name.min' => 'Name should be greater than 2 characters',
                    'display_name.min' => 'Display Name should be greater than 2 characters',
                    'module.required' => 'Module Name should be greater than 2 characters',
                    'module.min' => 'Module Name should be greater than 2 characters',
                ]
            );

            $PermissionName = $request->name;

            $CheckPermission = Permission::all()->filter(function($record) use($PermissionName) {
                if($record->name == $PermissionName) {
                    return $record;
                }
            });

            if(count($CheckPermission) > 0) {
                return redirect('add_permission')->withErrors('Permission already exists.')->withInput();
            }

            try {
                $NewPermission = new Permission;

                $NewPermission->name = $request->name;
                $NewPermission->display_name = $request->display_name;
                $NewPermission->module = $request->module;
                $NewPermission->description = $request->description;

                $NewPermission->save();

                return redirect('permissions')->with('title', 'Permission Added')->with('status', 'New Permission has been added. Implement it in code and test all possible scenarios.');
            }
            catch (QueryException $exception){
                return redirect('add_permission')->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else {
            return view('errors.401');
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_permission_by_module() {
        if(Auth::user()->can('add_permission')) {
            return view('permission.create_module');
        }
        else
            return view('errors.401');
    }

    public function store_permission_by_module(Request $request)
    {
        if(Auth::user()->can('add_permission')){
            $this->validate($request, [
                'module' => 'required|min:2',
            ],
                [
                    'module.required' => 'Module Name should be greater than 2 characters',
                    'module.min' => 'Module Name should be greater than 2 characters',
                ]
            );

            $ModuleName = $request->module;

            $CheckModule = Permission::all()->filter(function($record) use($ModuleName) {
                if($record->module == $ModuleName) {
                    return $record;
                }
            });

            if(count($CheckModule) > 0) {
                return redirect('add_permission_by_module')->withErrors('Module already exists.')->withInput();
            }

            try {
                $NewPermission = new Permission;

                $NewPermission->name = 'view_'.$ModuleName;
                $NewPermission->display_name = 'View '.$ModuleName;
                $NewPermission->module = $ModuleName;
                $NewPermission->description = 'This permission allows users to view all '.$ModuleName.' entries entered in the system.';

                $NewPermission->save();

                $NewPermission = new Permission;

                $NewPermission->name = 'add_'.$ModuleName;
                $NewPermission->display_name = 'Add '.$ModuleName;
                $NewPermission->module = $ModuleName;
                $NewPermission->description = 'This permission allows users to add new '.$ModuleName.' entry in the system.';

                $NewPermission->save();

                $NewPermission = new Permission;

                $NewPermission->name = 'edit_'.$ModuleName;
                $NewPermission->display_name = 'Edit '.$ModuleName;
                $NewPermission->module = $ModuleName;
                $NewPermission->description = 'This permission allows users to edit '.$ModuleName.' entry in the system.';

                $NewPermission->save();

                $NewPermission = new Permission;

                $NewPermission->name = 'delete_'.$ModuleName;
                $NewPermission->display_name = 'Delete '.$ModuleName;
                $NewPermission->module = $ModuleName;
                $NewPermission->description = 'This permission allows users to delete any '.$ModuleName.' entry from the system.';

                $NewPermission->save();

                $NewPermission = new Permission;

                $NewPermission->name = 'get_'.$ModuleName;
                $NewPermission->display_name = 'Get '.$ModuleName.' Details';
                $NewPermission->module = $ModuleName;
                $NewPermission->description = 'This permission allows users to get '.$ModuleName.' entry details from the system by providing its id.';

                $NewPermission->save();

                return redirect('permissions')->with('title', 'Permissions Added')->with('status', 'New Permissions have been added. Implement it in code and test all possible scenarios.');
            }
            catch (QueryException $exception){
                return redirect('add_permission_by_module')->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else {
            return view('errors.401');
        }
    }

    public function edit_permission($id)
    {
        if(Auth::user()->can('edit_permission')) {
            $permission = Permission::findOrFail($id);
            return view('permission.edit', compact('permission'));
        }
        else
            return view('errors.401');
    }

    public function update_permission($id, Request $request)
    {
        if(Auth::user()->can('edit_permission')) {
            $this->validate($request, [
                'name' => 'required|min:2',
                'display_name' => 'required|min:2',
                'module' => 'required|min:2',
            ],
                [
                    'name.required' => 'Name, which is to be used in coding, is required.',
                    'display_name.required' => 'Display Name is required.',
                    'name.min' => 'Name should be greater than 2 characters',
                    'display_name.min' => 'Display Name should be greater than 2 characters',
                    'module.required' => 'Module Name should be greater than 2 characters',
                    'module.min' => 'Module Name should be greater than 2 characters',
                ]
            );

            $PermissionName = $request->name;

            $CheckPermission = Permission::all()->filter(function ($record) use ($id, $PermissionName) {
                if ($id != $record->id) {
                    if ($record->name == $PermissionName) {
                        return $record;
                    }
                }
            });

            if (count($CheckPermission) > 0) {
                return redirect('edit_permission/' . $id)->withErrors('Permission already exists.')->withInput();
            }

            try {
                $EditPermission = Permission::findOrFail($id);

                $EditPermission->name = $request->name;
                $EditPermission->display_name = $request->display_name;
                $EditPermission->module = $request->module;
                $EditPermission->description = $request->description;

                $EditPermission->save();

                return redirect('permissions')->with('title', 'Permission Updated')->with('status', 'Permission has been uppdated. Implement it in code and test all possible scenarios.');
            } catch (QueryException $exception) {
                return redirect('edit_permission/' . $id)->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else
            return view('errors.401');
    }

    /**
     * Destroy the given permission.
     *
     * @param  Request  $request
     * @param  string  $cat_Id
     * @return Response
     */
    public function delete_permission($Id)
    {
        if(Auth::user()->can('delete_permission')){
            $permission = Permission::findOrFail($Id);

            try {
                $permission->delete();
                return redirect('permissions')->with('status', 'Permission has been deleted!');
            }
            catch (QueryException $ex) {
                return redirect('permissions')->withErrors('Permission cannot be deleted. Some unexpected error has occured');
            }

        }
        else
            return view('errors.401');
    }


}
