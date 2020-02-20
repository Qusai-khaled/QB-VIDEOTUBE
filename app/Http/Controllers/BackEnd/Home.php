<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $comments  = Comment::orderBy('id', 'desc')->Paginate(5);;
        return view('back-end.home')->with('comments', $comments);
    }
}
