<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect("/user");
    }
    public function store(Request $request)
    {
        if(!$request['id'])
        {    User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            return redirect("user");
        }
        else
        {
                $user = User::find($request->id);
        
                $user->update(['password' => Hash::make($request->get('password')), 'name'=>$request->get('name'), 'email'=>$request->get('email')]);
        
                return back()->withStatusPassword(__('User successfully updated.'));
        }
    }
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);
        $user->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function search(Request $request)
    {
        $users = User::search($request['search'])->get();
        return view('users.index', ['users' => $users]);
    }
}
