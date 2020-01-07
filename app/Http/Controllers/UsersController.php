<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $request->searchEmail;
        $users = User::orderBy('id', 'DESC')->searchByEmail($email)->with('roles')->paginate(10);
        $roles = Role::pluck('name', 'id');
       
        return view('users.users', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->user = $request->user;
        $user->email = $request->email;
        $user->password = bcrypt('secret');

        if ($user->save() && $user->roles()->sync($request->role)) {
            return 1;
            // return redirect()->route('users.index')->with('info', trans('app.user_stored'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        return view('users.edit',['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {        
        if ($user->update($request->all()) && $user->roles()->sync($request->role)) {
            return redirect()->route('users.index')->with('info', trans('app.user_updated', ['name' => $user->user]));
        }
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {        
        if ($user->delete()) {
            return redirect()->route('users.index')->with('info', trans('app.user_destroyed', ['name' => $user->user]));
        }
    }
}
