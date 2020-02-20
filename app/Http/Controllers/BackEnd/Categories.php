<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Categories\store;
use App\Models\Category;

class Categories extends Controller
{
    public function index()
    {
        $categories = Category::Paginate(5);
        return view('back-end.categories.index')->with('categories', $categories);
    }
    public function create()
    {
        return view('back-end.categories.create');
    }
    public function store(store $request)
    {
        Category::create($request->all());
        return redirect(route('categories.index'));
    }
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('back-end.categories.edit')->with('categories', $categories);
    }
    public function update($id, store $request)
    {
        $categories = Category::findOrFail($id);
        $categories->update($request->all());
        return redirect(route('categories.index'));
    }
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect(route('categories.index'));
    }
}
