<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Post;

class MainController extends Controller
{
    public function index()
    {
    	$posts = Post::paginate(2);

        return view('site.index', compact('posts'));
    }
}
