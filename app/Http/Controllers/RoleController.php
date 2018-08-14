<?php

namespace URM\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use URM\Permission;
use URM\Role;

class RoleController extends Controller
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
        if(Auth::user()->can('view_role')){

            $AllRoles = Role::all();

            return view('role.roles', compact('AllRoles'));
        }
        else{
            return view('errors.401');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_role() {
        if(Auth::user()->can('add_role')) {

            $Permissions = Permission::latest()->get();
            $Sections = array();

            foreach ($Permissions as $permission){
                if(!array_has($Sections, $permission->module))
                    $Sections[$permission->module] = $permission->module;
            }

            return view('role.create', compact('Permissions', 'Sections'));
        }
        else
            return view('errors.401');
    }

    public function store_role(Request $request)
    {
        if(Auth::user()->can('add_role')){
            $this->validate($request, [
                'name' => 'required|min:2',
                'display_name' => 'required|min:2',
            ],
                [
                    'name.required' => 'Name, which is to be used in coding, is required.',
                    'display_name.required' => 'Display Name is required.',
                    'name.min' => 'Name should be greater than 2 characters',
                    'display_name.min' => 'Display Name should be greater than 2 characters',
                ]
            );

            $RoleName = $request->name;

            $CheckRole = Role::all()->filter(function($record) use($RoleName) {
                if($record->name == $RoleName) {
                    return $record;
                }
            });

            if(count($CheckRole) > 0) {
                return redirect('add_role')->withErrors('Role already exists.')->withInput();
            }

            try {
                $NewRole = new Role;

                $NewRole->name = $request->name;
                $NewRole->display_name = $request->display_name;
                $NewRole->description = $request->description;

                $NewRole->save();

                $NewRole->perms()->sync($request->Permission);

                return redirect('roles')->with('title', 'Role Added')->with('status', 'New Role has been added.');
            }
            catch (QueryException $exception){
                return redirect('add_role')->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else {
            return view('errors.401');
        }
    }

    public function edit_role($id)
    {
        if(Auth::user()->can('edit_role')) {
            $role = Role::findOrFail($id);

            $Permissions = Permission::latest()->get();
            $Sections = array();

            foreach ($Permissions as $permission){
                if(!array_has($Sections, $permission->module))
                    $Sections[$permission->module] = $permission->module;
            }

            return view('role.edit', compact('role', 'Permissions', 'Sections'));
        }
        else
            return view('errors.401');
    }

    public function update_role($id, Request $request)
    {
        if(Auth::user()->can('edit_role')) {
            $this->validate($request, [
                'name' => 'required|min:2',
                'display_name' => 'required|min:2',
            ],
                [
                    'name.required' => 'Name, which is to be used in coding, is required.',
                    'display_name.required' => 'Display Name is required.',
                    'name.min' => 'Name should be greater than 2 characters',
                    'display_name.min' => 'Display Name should be greater than 2 characters',
                ]
            );

            $RoleName = $request->name;

            $CheckRole = Role::all()->filter(function($record) use($id, $RoleName) {
                if($id != $record->id) {
                    if ($record->name == $RoleName) {
                        return $record;
                    }
                }
            });

            if(count($CheckRole) > 0) {
                return redirect('edit_role/'.$id)->withErrors('Role already exists.')->withInput();
            }

            try {
                $EditRole = Role::findOrFail($id);

                $EditRole->name = $request->name;
                $EditRole->display_name = $request->display_name;
                $EditRole->description = $request->description;

                $EditRole->save();

                $EditRole->perms()->sync([]);
                $EditRole->perms()->sync($request->Permission);

                return redirect('roles')->with('title', 'Role Updated')->with('status', 'Role has been uppdated. Implement it in code and test all possible scenarios.');
            }
            catch (QueryException $exception){
                return redirect('edit_role/'.$id)->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else
            return view('errors.401');
    }

    /**
     * Destroy the given role.
     *
     * @param  Request  $request
     * @param  string  $cat_Id
     * @return Response
     */
    public function delete_role($Id)
    {
        if(Auth::user()->can('delete_role')){
            $role = Role::findOrFail($Id);

            try {
                $role->delete();
                return redirect('roles')->with('status', 'Role has been deleted!');
            }
            catch (QueryException $ex) {
                return redirect('roles')->withErrors('Role cannot be deleted. Some unexpected error has occured');
            }
        }
        else
            return view('errors.401');
    }
}
