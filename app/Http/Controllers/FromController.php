<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class FromController extends Controller
{
    public function index()
    {
        return view('createUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        // $name = $request->name;
        // $email = $request->email;
        // $password = $request->password;
        // $user->name = $name;
        // $user->email = $email;
        // $user->password = $password;

        $user->save();

        //redirect to the show page
        return redirect()->route('user.show')->with('success', 'User created successfully.');

    }

    public function show()
    {
        $users = User::all();

        return view('showUser', compact('users'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('editUser', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        // dd($user);
        $user->save();

        //redirect to the show page
        return redirect()->route('user.show')->with('success', 'User updated successfully.');


    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


}
