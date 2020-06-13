<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'picture'=>'image',
            'content'=>'required'
        ]);
        if($request->hasFile('picture'))
        {
            $file=$request->file('picture');
            $image_name=$request->file('picture')->getClientOriginalName();
            $file->move('storage/posts_images/',$image_name);
            $input['title']=$request->get('title');
            $input['category']=$request->get('category');
            $input['picture']=$image_name;
            $input['content']=$request->get('content');
            Posts::create($input);
        }
        else
        {
            $filenametostore='noimage.jpg';
            $input['title']=$request->get('title');
            $input['category']=$request->get('category');
            $input['picture']=$filenametostore;
            $input['content']=$request->get('content');
            Posts::create($input);
            return redirect('/home');
        }
             return redirect('/home')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post=Posts::where('id',$id)->get();
        $categories=Category::select('name','id')->get();
        return view('editpost')->with(compact('post','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'content'=>'required'
        ]);
        $post=Posts::find($request->id);
        if($request->hasFile('picture'))
        {
            $file=$request->file('picture');
            $fileNamewithext=$request->file('picture')->getCientOriginalName();
            $file->move('storage/posts_images/',$fileNamewithext);
            Storage::delete('/public/post_images'.$post->picture);
        }
        $post->title=$request->get('title');
        if($request->hasFile('picture'))
        {
            $post->picture=$request->file('picture')->getClientOriginalName();
        }
        $post->category=$request->get('category');
        $post->content=$request->get('content');
        $post->save();
        return redirect('/home')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Posts::find($id);
        Storage::delete($post->picture);
        Posts::destroy($id);
        return redirect('/home')->with('success','post deleted');
    }
}
