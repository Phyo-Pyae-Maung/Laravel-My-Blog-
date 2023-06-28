<?php

namespace App\Http\Controllers;
use App\Models\{Category, Post, User, Comment, LikesDislike};
use Auth;
use Illuminate\Http\Request;


class UiController extends Controller
{
    public function index(Request $request)
    {
    
        if (isset($request->q)) {
            $categories = Category::all();
            $posts = Post::query()
                ->where('title', 'LIKE', "%{$request->q}%")
                ->orWhere('content', 'LIKE', "%{$request->q}%")
                ->paginate(10);
        } 
        else{
            $categories = Category::all();
            $posts = Post::paginate(10);
        }
        return view('uipanel.index', compact('posts','categories'));

    }

    public function postDetail($id)
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        $post = Post::find($id); 
        $user = User::find($id);
        $likes = LikesDislike::where('post_id',$id)->where('type','like')->get(); 
        $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get(); 
        $comments = Comment::where('post_id',$id)->get();

        $likeStatus = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();
        return view('uipanel.postdetail',compact('post','user','comments','likes','dislikes','likeStatus'));

        
    }

    public function searchByCategory($id)
    {
        $categories = Category::all();
        $posts = Post::where('category_id','=',$id)->paginate(10);
        return view('uipanel.index',compact('posts','categories'));
    }

}