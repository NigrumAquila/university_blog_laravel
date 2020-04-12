<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create', ['rights' => with(new User())->getRightsList()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required|string|min:6',
            'password'  =>  'required|string|min:6',
            'rights'  =>  'required|string|in:admin,manager,none',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        return view('users.show', ['user' => User::findOrFail($id)]);
    }
    
    public function edit($id)
    {
        return view('users.edit', ['user' => User::findOrFail($id), 'rights' => with(new User())->getRightsList()]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  =>  'string|min:6',
            'password'  =>  'string|min:6',
            'rights'  =>  'string|in:admin,manager,none',
        ]);
        
        $user = User::find($id);
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
