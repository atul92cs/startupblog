<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Photos;

class PageController extends Controller
{
    public function index()
    {
        $posts=Posts::orderBy('id','desc')->take(6)->get();
        return view('welcome')->with('posts',$posts);
    }
    public function about()
    {
        return view('about');
    }
    public function getPost($id)
    {
        $post=Posts::where('id',$id)->get();
        $photos=Photos::where('post_id',$id)->get();
        return view('post')->with(compact('post','photos'));
    }
}
