<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Pages\Store;
use App\Models\Page;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function index()
    {
        $pages = Page::Paginate(5);
        return view('back-end.pages.index')->with('pages', $pages);
    }
    public function create()
    {
        return view('back-end.pages.create');
    }
    public function store(store $request)
    {
        Page::create($request->all());
        return redirect(route('pages.index'));
    }
    public function edit($id)
    {
        $pages = Page::findOrFail($id);
        return view('back-end.pages.edit')->with('pages', $pages);
    }
    public function update($id, Store $request)
    {
        $pages = Page::findOrFail($id);
        $pages->update($request->all());
        return redirect(route('pages.index'));
    }
    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        return redirect(route('pages.index'));
    }
}
