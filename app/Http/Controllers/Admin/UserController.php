<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\RoleUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role_user')->get();
        return view('admin/users' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:2|max:40',
           'email' => 'required|unique:users|min:6|max:100',
            'password' =>'min:6|max:100'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $roleUser = new RoleUser();
        $roleUser->user_id = $user->id;
        $roleUser->role_id = $request->role_id;
        $roleUser->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = RoleUser::all()->where('user_id' , $id)->first();
        $roleUser = RoleUser::all();
        $role = Role::with('role_user')->get();
        $user = User::with('role_user')->find($id);
        return view('admin/user-edit' , compact('user' , 'roleUser', 'role', 'userId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roleUser1 = RoleUser::find($id);
//        dd($roleUser1);
        $roleUser1->fill($request->except('_token', '_method'));
        $roleUser1->save();

        $user = User::find($id);
        $user->fill($request->only('name', 'email'));
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::where('id' , $id);
        $deleteUser->delete();
        return redirect()->back()->with('Пользователь успешно уничтожен!');
    }

    public function createUser()
    {
        $roles = Role::with('role_user')->get();
        return view('admin/user-create' , compact('roles'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
