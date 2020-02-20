<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Skills\Store;
use Illuminate\Http\Request;
use App\Models\Skill;

class Skills extends Controller
{
    public function index()
    {
        $skills = Skill::Paginate(5);
        return view('back-end.skills.index')->with('skills', $skills);
    }

    public function create()
    {
        return view('back-end.skills.create');
    }
    public function store(Store $request)
    {
        Skill::create($request->all());
        return redirect(route('skills.index'));
    }
    public function edit($id)
    {
        $skills = Skill::findOrFail($id);
        return view('back-end.skills.edit')->with('skills', $skills);
    }
    public function update($id, Store $request)
    {
        $skills = Skill::findOrFail($id);
        $skills->update($request->all());
        return redirect(route('skills.index'));
    }
    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();
        return redirect(route('skills.index'));
    }
}
