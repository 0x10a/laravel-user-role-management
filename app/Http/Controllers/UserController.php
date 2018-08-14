<?php

namespace URM\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use URM\Role;
use URM\User;

class UserController extends Controller
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
        if(Auth::user()->can('view_users')){
            $users = User::latest()->get();

            return view('users.users', compact('users'));
        }
        else{
            return view('errors.401');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_user() {
        if(Auth::user()->can('add_users')) {

            $Roles = Role::latest()->get();

            return view('users.create', compact('Roles'));
        }
        else
            return view('errors.401');
    }

    /**
     * Method to store the data for new user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store_user(Request $request)
    {
        if(Auth::user()->can('add_users')){

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            try {
                $NewUser = new User;

                $NewUser->email = $request->email;
                $NewUser->name = $request->name;
                $NewUser->password = bcrypt($request->password);

                $NewUser->save();

                $NewUser->roles()->attach($request->Role);

                return redirect('users')->with('title', 'User Added')->with('status', 'Provide login credentials to the users to have access to the system.');
            }
            catch (QueryException $exception){
                return redirect('add_user')->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else
            return view('errors.401');
    }

    /**
     * Method to call the view to edit data for the user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit_user($id)
    {
        if (Auth::user()->can('edit_users')) {

            $user = User::findOrFail($id);
            $Roles = Role::latest()->get();

            return view('users.edit', compact('Roles', 'user'));
        }
        else
            return view('errors.401');

    }

    /**
     * Method to store the data for old user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update_user($user, Request $request)
    {
        if(Auth::user()->can('edit_users')){

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);

            if($request->password != '' && $request->password != null )
            {
                $this->validate($request, [
                    'password' => 'string|min:6|confirmed',
                ]);
            }

            $Email = $request->email;

            $EditUser = User::findOrFail($user);

            $CheckUser = User::all()->filter(function($record) use($Email, $user) {
                if($record->email == $Email and $record->id != $user) {
                    return $record;
                }
            });

            if(count($CheckUser) > 0) {
                return redirect('edit_user/'.$user)->withErrors('Email already exists.')->withInput();
            }

            try {

                $EditUser->email = $request->email;
                $EditUser->name = $request->name;

                if($request->password != '' && $request->password != null )
                    $EditUser->password = bcrypt($request->password);

                $EditUser->save();

                $EditUser->roles()->detach();
                $EditUser->roles()->attach($request->Role);

                return redirect('users')->with('title', 'User Updated')->with('status', 'If roles have been modified, then users will be dealt accordingly.');
            }
            catch (QueryException $exception){
                return redirect('edit_user/'.$user)->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else
            return view('errors.401');
    }

    /**
     * Method to call the view to edit data for the user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile($id)
    {
        if (Auth::user()->can('edit_profile')) {

            $user = User::findOrFail($id);

            return view('users.profile', compact('user'));
        }
        else
            return view('errors.401');

    }

    /**
     * Method to store the data for old user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update_profile($user, Request $request)
    {
        if(Auth::user()->can('edit_profile')){

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);

            if($request->password != '' && $request->password != null )
            {
                $this->validate($request, [
                    'password' => 'string|min:6|confirmed',
                ]);
            }

            $Email = $request->email;

            $EditUser = User::findOrFail($user);

            $CheckUser = User::all()->filter(function($record) use($Email, $user) {
                if($record->email == $Email and $record->id != $user) {
                    return $record;
                }
            });

            if(count($CheckUser) > 0) {
                return redirect('profile/'.$user)->withErrors('Email already exists.')->withInput();
            }

            try {

                $EditUser->email = $request->email;
                $EditUser->name = $request->name;

                if($request->password != '' && $request->password != null )
                    $EditUser->password = bcrypt($request->password);

                $EditUser->save();

                return redirect($request->redirects_to)->with('title', 'Profile Updated')->with('status', 'Your Profile has been updated.');
            }
            catch (QueryException $exception){
                return redirect('profile/'.$user)->withErrors('There was some issue with your input. Please check and submit again.')->withInput();
            }
        }
        else
            return view('errors.401');
    }


    /**
     * Destroy the given user.
     *
     * @param  Request  $request
     * @param  string  $cat_Id
     * @return Response
     */
    public function delete_user($Id)
    {
        if(Auth::user()->can('delete_users')){
            $user = User::findOrFail($Id);

            try {
                $user->delete();
                return redirect('users')->with('status', 'User has been deleted!');
            }
            catch (QueryException $ex) {
                return redirect('users')->withErrors('User cannot be deleted. Some unexpected error has occured');
            }
        }
        else
            return view('errors.401');
    }

}
