<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index(){

        $posts = Post::with('user')->paginate(10);

        return view('posts.index', compact('posts', 'posts'));

    }

    public function show($id){
        $post = Post::with('comments')->find($id);
        return view('posts.show', compact('post'));
    }

    public function create(){

        return view('posts.create');

    }

    public function store(){

        $this->validate(
            request(),
            [
                'title' => 'required|max:20',
                'body' => 'required'
            ]
            );

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return redirect('/posts');

    }

    

}
