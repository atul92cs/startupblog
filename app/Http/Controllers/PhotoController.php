<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class PhotoController extends Controller
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
    public function create($id)
    {
        //
        return view('addphoto')->with('post_id',$id);
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
            'source'=>'required',
            'post_id'=>'required'
        ]);
        if($request->hasFile('source'))
        {
            $file=$request->file('source');
            $image_name=$request->file('source')->getClientOriginalName();
            $imageName=time().'.'.$request->file('source')->extension();
            $file->move('storage/posts_image/',$imageName);
            $input['source']=$imageName;
            $input['post_id']=$request->input('post_id');
            Photos::create($input);
        }
        return redirect('/post/album/'.$request->input('post_id'))->with('success','photo uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $photos=Photos::where('post_id',$id)->get();
        return view('album')->with(compact('photos','id'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $photos=Photo::where('post_id',$id)->get();
        return view('album')->with(compact('photos','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photos $photos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $photo=Photos::find($id);
        Storage::delete('public/posts_images/'.$photo->source);
        Photos::destroy($id);
        return redirect('/post/album/'.$photo->post_id)->with('success','Photo deleted');
    }
}
