<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function index()
    {
        $users = User::Paginate(5);
        return view('back-end.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('back-end.users.create');
    }
    public function store(Store $request)
    {
        $requestArray = $request->all();
        $requestArray['password'] = Hash::make($requestArray['password']);
        User::create($requestArray);
        return redirect(route('users.index'));
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('back-end.users.edit')->with('users', $users);
    }
    public function update($id, Update $request)
    {
        $users = User::findOrFail($id);
        $requestArray = $request->all();
        if (isset($requestArray['password']) && $requestArray['password'] != "") {
            $requestArray['password'] = Hash::make($requestArray['password']);
        } else {
            unset($requestArray['password']);
        }
        $users->update($requestArray);
        return redirect(route('users.index'));
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect(route('users.index'));
    }
}
