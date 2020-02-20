<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Http\Requests\FrontEnd\Messages\Store as AppStore;
use App\Http\Requests\FrontEnd\Users\Store as AppHttpStore;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'category', 'skill', 'video', 'contactUs', 'welcome'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $videos = Video::Published()->orderBy('id', 'desc')->Paginate(9);
        $videos_count = Video::count();
        $comments_count = Comment::count();
        $skills_count = Skill::count();
        $users_count = User::count();
        $cat_count = Category::count();
        return view('welcome')
            ->with('videos', $videos)
            ->with('videos_count', $videos_count)
            ->with('comments_count', $comments_count)
            ->with('skills_count', $skills_count)
            ->with('users_count', $users_count)
            ->with('cat_count', $cat_count);;
    }
    public function index()
    {
        $videos = Video::Published()->orderBy('id', 'desc');
        if (request()->has('search') && request()->get('search') != '') {
            $videos = $videos->where('name', 'like', "%" . request()->get('search') . "%");
        }
        $videos = $videos->paginate(9);
        return view('home')->with('videos', $videos);
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $videos = Video::Published()->where('cat_id', $id)->orderBy('id', 'desc')->Paginate(6);
        $num = Video::Published()->where('cat_id', $id)->count();
        return view('front-end.category.index')
            ->with('videos', $videos)
            ->with('category', $category)
            ->with('num', $num);
    }
    public function skill($id)
    {
        $skill = Skill::findOrFail($id);
        $videos = Video::Published()->whereHas('skills', function ($query) use ($id) {
            $query->where('skill_id', $id);
        })->orderBy('id', 'desc')->Paginate(6);
        $num = Video::Published()->whereHas('skills', function ($query) use ($id) {
            $query->where('skill_id', $id);
        })->count();
        return view('front-end.skill.index')
            ->with('videos', $videos)
            ->with('skill', $skill)
            ->with('num', $num);
    }

    public function video($id)
    {
        $video = Video::Published()->findOrFail($id);
        return view('front-end.video.index')
            ->with('video', $video);
    }


    public function tag($id)
    {
        $tag = Tag::findOrFail($id);
        $videos = Video::Published()->whereHas('tags', function ($query) use ($id) {
            $query->where('tag_id', $id);
        })->orderBy('id', 'desc')->Paginate(6);
        $num = Video::Published()->whereHas('tags', function ($query) use ($id) {
            $query->where('tag_id', $id);
        })->count();
        return view('front-end.tag.index')
            ->with('videos', $videos)
            ->with('tag', $tag)
            ->with('num', $num);
    }

    public function commentUpdate($id, Store $request)
    {
        $comment = Comment::findOrFail($id);
        $Lang = \Lang::get('validation.alert.commentUpdate');
        if (($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin') {
            $comment->update(['comment' => $request->comment]);
            alert()->success($Lang);
        }
        return redirect()->route('front.video', ['id' => $comment->video_id, '#commnets']);
    }

    public function commentStore($id, Store $request)
    {
        $video = Video::Published()->findOrFail($id);
        $Lang = \Lang::get('validation.alert.commentStore');
        Comment::create([
            'user_id' => auth()->user()->id,
            'video_id' => $video->id,
            'comment' => $request->comment
        ]);
        alert()->success($Lang);

        return redirect()->route('front.video', ['id' => $video->id, '#commnets']);
    }

    public function contactUs(AppStore  $request)
    {
        Message::create($request->all());
        $Lang = \Lang::get('validation.alert.contactUs');
        alert()->success($Lang);
        return redirect()->route('frontend.landing');
    }

    public function page($id, $slug = null)
    {
        $page = Page::findOrFail($id);
        return view('front-end.page.index')->with('page', $page);
    }
    public function profile($id, $slug = null)
    {
        $user = User::findOrFail($id);
        $videos = Video::Published()->where('user_id', $id)->orderBy('id', 'desc')->Paginate(6);
        $num = Video::Published()->where('user_id', $id)->orderBy('id', 'desc')->count();
        return view('front-end.profile.index')
            ->with('user', $user)
            ->with('num', $num)
            ->with('videos', $videos);
    }
    public function profileUpdate(AppHttpStore $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $Lang = \Lang::get('validation.alert.profileUpdate');
        $array = [];
        if ($request->email != $user->email) {
            $email = User::where('email', $request->email)->first();
            if ($email == null) {
                $array['email'] =  $request->email;
            }
        }
        if ($request->name != $user->name) {
            $array['name'] =  $request->name;
        }
        if ($request->password != '') {
            $array['password'] =  Hash::make($request->password);
        }
        if (!empty($array)) {
            $user->update($array);
        }
        alert()->success($Lang);
        return redirect()->route('front.profile', ['id' => $user->id, 'slug' => strtolower(trim(str_replace(' ', '_', $user->name)))]);
    }

    public function commentDelete($id)
    {
        $Comment = Comment::findOrFail($id);
        $Lang = \Lang::get('validation.alert.commentDelete');
        $Comment->delete();
        alert()->success($Lang);
        return redirect()->route('front.video', ['id' => $Comment->video_id, '#commnets']);
    }
}
