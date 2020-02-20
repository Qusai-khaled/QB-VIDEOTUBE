<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Videos extends Controller
{
    use commentTrait;
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->Paginate(5);
        return view('back-end.videos.index')->with('videos', $videos);
    }
    public function create()
    {
        $tags = Tag::all();
        $skills = Skill::all();
        $categories = Category::all();
        return view('back-end.videos.create')
            ->with('categories', $categories)
            ->with('skills', $skills)
            ->with('tags', $tags);
    }
    public function store(Store $request)
    {
        $fileName = $this->uploadImage($request);
        $requestArray = ['user_id' => auth()->user()->id, 'image' => $fileName] + $request->all();
        $row = Video::create($requestArray);
        $this->syncTagsSkills($row, $requestArray);
        return redirect(route('videos.index'));
    }
    public function edit($id)
    {

        $tags = Tag::all();
        $skills = Skill::all();
        $categories = Category::all();
        $videos = Video::findOrFail($id);
        $selectedSkills = $videos->skills()->get()->pluck('id')->toArray();
        $selectedTags = $videos->tags()->get()->pluck('id')->toArray();
        $comments = $videos->comments()->orderBy('id', 'desc')->get();


        return view('back-end.videos.edit')
            ->with('tags', $tags)
            ->with('videos', $videos)
            ->with('selectedSkills', $selectedSkills)
            ->with('selectedTags', $selectedTags)
            ->with('categories', $categories)
            ->with('skills', $skills)
            ->with('comments', $comments);
    }
    public function update($id, Update $request)
    {
        $requestArray = $request->all();
        $videos = Video::findOrFail($id);
        if ($request->hasFile('image')) {
            $fileName = $this->uploadImage($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $videos->update($requestArray);
        $this->syncTagsSkills($videos, $requestArray);
        return redirect(route('videos.index'));
    }
    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return redirect(route('videos.index'));
    }

    protected function syncTagsSkills($row, $requestArray)
    {
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }

    protected function uploadImage($request)
    {
        $file = $request->file('image');
        $fileName = time()  . Str::random(12) . $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        return $fileName;
    }
}
