<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Services\GroupsService;

class GroupsController extends Controller
{
    public function index()
    {
        return view('groups.index', ['groups' => Group::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required|string',
        ]);
        
        $group = Group::add($request->all());
        return redirect()->route('groups.index');
    }

    public function show($id)
    {
        return view('groups.show', with(new GroupsService())->showData($id));
    }

    public function edit($id)
    {
        return view('groups.edit', ['group' => Group::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  =>  'string',
        ]);

        $group = Group::find($id);
        $group->edit($request->all());
        return redirect()->route('groups.index');
    }

    public function showDeleteForm($id)
    {
        return view('groups.showDeleteForm', ['group' => Group::findOrFail($id)]);
    }

    public function destroy($id)
    {
        Group::find($id)->delete();
        return redirect()->route('groups.index');
    }
}
