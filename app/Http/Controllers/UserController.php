<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use Redirect;
use Response;
use App\Http\Models\User;
use App\Http\Models\Role;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use App\Http\Services\UserService;
use App\Http\RequestHandlers\CreateUserRequestHandler;
use App\Http\RequestHandlers\UpdateUserProfileRequestHandler;

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

    public function getUserCreatePage()
    {
        if (!Auth::user()->hasManagingPermission()) {
            abort(404);
        }
        $roleArray = CommonHelper::getRoles();
        return View::make('pages.user_create')->with('roles', $roleArray);
    }

    public function createUser(CreateUserRequestHandler $request, UserService $userService)
    {
        if (!Auth::user()->hasManagingPermission()) {
            abort(404);
        }
        $rtnObj = $userService->createUser($request->all());
        Session::flash('message', $rtnObj['message']);
        Session::flash('type', $rtnObj['type']);
        if ($rtnObj['type'] == 'danger') {
            return Redirect::back()->withInput();
        }
        return Redirect::route('user.user-list-get')->with($rtnObj);
    }
    
    public function getUserList()
    {
        if (!Auth::user()->hasManagingPermission()) {
            abort(404);
        }
        $users = User::where('id', '!=', 1)->paginate(10);
        return View::make('pages.user_list')->with('users', $users);
    }


    public function getUserUpdatePage($id)
    {
        if ($id == 1) {
            return Redirect::route('user.user-list-get')->with(['message' => 'User not found.', 'type' => 'danger']);
        }
        $user = User::find($id);
        if (empty($user)) {
            return Redirect::route('user.user-list-get')->with(['message' => 'User not found.', 'type' => 'danger']);
        }

        return View::make('pages.user_update')->with('user', $user);
    }

    public function updateUser(CreateUserRequestHandler $request, UserService $userService)
    {
        $rtnObj = $userService->updateUser($request->all());
        Session::flash('message', $rtnObj['message']);
        Session::flash('type', $rtnObj['type']);
        if ($rtnObj['type'] == 'danger') {
            return Redirect::back()->withInput();
        }
        return Redirect::route('user.user-list-get')->with($rtnObj);
    }

    public function getUserProfile()
    {
        $user = Auth::user();
        return View::make('pages.user_profile')->with('user', $user);
    }

    public function updateUserProfile(UpdateUserProfileRequestHandler $request, UserService $userService)
    {
        $rtnObj = $userService->updateUserProfile($request->all());
        Session::flash('message', $rtnObj['message']);
        Session::flash('type', $rtnObj['type']);
        if ($rtnObj['type'] == 'danger') {
            return Redirect::back()->withInput();
        }
        return Redirect::back();
    }

    public function resetPassword(Request $request, UserService $userService)
    {
        $rtnObj = $userService->updatePassword($request->all());
        Session::flash('message', $rtnObj['message']);
        Session::flash('type', $rtnObj['type']);
        if ($rtnObj['type'] == 'danger') {
            return Redirect::back()->withInput();
        }
        return Redirect::back();
    }
}
