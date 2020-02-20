<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class Tags extends Controller
{
    public function index()
    {
        $tags = Tag::Paginate(5);
        return view('back-end.tags.index')->with('tags', $tags);
    }

    public function create()
    {
        return view('back-end.tags.create');
    }
    public function store(Store $request)
    {

        Tag::create($request->all());
        return redirect(route('tags.index'));
    }
    public function edit($id)
    {
        $tags = Tag::findOrFail($id);
        return view('back-end.tags.edit')->with('tags', $tags);
    }
    public function update($id, Store $request)
    {
        $tags = Tag::findOrFail($id);
        $tags->update($request->all());
        return redirect(route('tags.index'));
    }
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect(route('tags.index'));
    }
}
