<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function show($tagName){
        $posts = Tag::where('name', $tagName)->first()->posts;

        return view('posts.index', compact('posts'));
    }
}
