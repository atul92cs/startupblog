@extends('layouts.app')
@section('content')
<div class="form-section">
  <form action="{{route('post.add')}}" method="post" enctype="multipart/form-data">
      @csrf 
      <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="Title" id="">
      </div>
      <div class="form-group">
        <input type="file" name="picture" class="form-control" id="">
      </div>
      <div class="form-group">
        <select name="category" id="" class="form-control">
            <option value="0">--Select--</option>
            @foreach($categories ?? '' as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
          <textarea name="content" id="" class="form-control" placeholder="Content" cols="30" rows="6"></textarea>
      </div>
      <div class="form-group text-center">
         <button type="submit" class="btn btn-primary">Add</button>
      </div>
  </form>
</div>
<div class="table-section">
   <table class="table">
       <thead>
           <tr>
               <th scope="col">Id</th>
               <th scope="col">Title</th>
               <th scope="col">Picture</th>
               <th scopr="col">Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td><img src="{{asset('storage/posts_images/'.$post->picture)}}" alt=""></td>
                <td><a href="/post/delete/{{$post->id}}"><button class="btn btn-danger">Delete</button></a> &nbsp; <a href="/post/edit/{{$post->id}}" class="btn btn-warning">Edit</a></td>
                <td><a href="/post/album/{{$post->id}}"><button class="btn btn-warning">Manage Album</button></a></td>
       
            </tr>
           @endforeach
       </tbody>
   </table>
</div>


@endsection
