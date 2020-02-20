<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;

trait commentTrait
{
    public function commentStore(Store $request)
    {
        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
        Comment::create($requestArray);

        return redirect(route('videos.edit', ['video' => $requestArray['video_id'], '#comments']));
    }

    public function commentDelete($id)
    {
        $Comment = Comment::findOrFail($id);
        $Comment->delete();
        return redirect(route('videos.edit', ['video' => $Comment->video_id, '#comments']));
    }

    public function commentUpdat($id, Store $request)
    {
        $Comment = Comment::findOrFail($id);
        $Comment->update($request->all());
        return redirect(route('videos.edit', ['video' => $Comment->video_id, '#comments']));
    }
}
