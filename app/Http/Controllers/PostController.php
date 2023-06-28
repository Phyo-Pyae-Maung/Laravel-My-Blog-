<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = "LaraTuto";

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
        return view('post.index', compact('posts','categories'));

        // $posts = Post::all();        
        // return view('post.index', compact('title', 'posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id'=> 'required'
         ]);  

        Post::create([
            'title'=> $request->title,
            'content'=> $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth()->user()->id
        ]);



        return redirect('admin/posts')->with('msg','a post created successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id); 
        return view('post.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required'
         ]);

        $post=Post::find($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect('admin/posts')->with('msg','a post updated successfully');
    }

    public function destory($id)
    {
        Post::find($id)->delete();
        return back()->with('msg','a post deleted');
    }

    public function postCommentsIndex($id)
    {
        $post= Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->get();
        return view('post.comment',compact('post', 'comments'));
    }

    public function denyComment($commentId)
    {
        Comment::find($commentId)->update([
            'status' => 'denied'
        ]);
        return back()->with('msg', 'Comment Denied');
    }
    



}

