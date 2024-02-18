<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // index
    public function index(Request $request)
    {
        //get all users with pagination
        $users = DB::table('users')->paginate(10);
        return view('pages.user.index', compact('users'));
    }
    // create
    public function create()
    {
        return view('pages.user.create');
    }
    // store
    public function store(Request $request)
    {
        //validate the request
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8',
            'role'=> 'required|in:admin,staff,user',
            ]);
            // $user = new User();
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = bcrypt($request->password);
            // $user->save();
            // return redirect()->route('')->with('success','');

    }
    // show
    public function show($id)
    {
        return view('pages.user.show');
    }
    // edit
    public function edit($id)
    {
        return view('pages.user.edit');
    }
    // update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email,'. $id,
            'role'=> 'required|in:admin,staff,user',
            ]);
            // $user = User::find($id);
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = <PASSWORD>($request->password);
            // $user->save();
            // return redirect()->route('')->with('success','');
            // return redirect()->route('user.index')->with('success','');
            // return view('pages.user.edit');
    }
    // destroy
    public function destroy($id)
    {
        //
    }

}
