<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storecomment(Request $request, $id)
    {
        Comment::create([
            'post_id' => $id,
            'user_id' => Auth()->user()->id,
            'text' => $request->text
        ]);

        return back();
    }

    public function postComments($id)
    {
        $post= Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->get();
        return view('post.comment',compact('post', 'comments'));
    }
}
