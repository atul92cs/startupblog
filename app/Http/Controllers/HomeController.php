<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Posts;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=DB::table('posts')
                 ->join('categories','categories.id','=','posts.category')
                 ->select(DB::raw('posts.id as id,posts.title as title,categories.name as category,posts.picture as picture,posts.content as content'))
                 ->get();
        $categories=Category::select('name','id')->get();
        return view('home')->with(compact('posts','categories'));
    }
}
