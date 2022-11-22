<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::all();

        return view('posts.index', compact('posts'));

    }

    public function show($id){
        $post = Post::find($id);

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
            'body' => request('body')
        ]);

        return redirect('/posts');

    }

}
