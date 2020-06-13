@extends('layouts.app')
@section('content')
<div class="form-section">
  <form action="{{route('post.update')}}" method="post" enctype="multipart/form-data">
     @csrf 
    <div class="form-group">
      <input type="hidden" name="id" value="{{$post[0]->id}}">
     </div>
   
      <div class="form-group">
          <input type="text" name="title" value="{{$post[0]->title}}" id="" class="form-control">
      </div>
      <div class="form-group">
        <input type="file" name="picture" class="form-control"  id="">
         <img src="{{asset('storage/posts_images/'.$post[0]->picture)}}" alt="product-image" >
   
      </div>
      <div class="form-group">
      <select name="category" class="form-control" id="">
         <option value="0">--Select--</option>
         @foreach($categories as $category)

         <option value="{{$category->id}}"
            @if($post[0]->category==$category->id)
                {{'selected="selected"'}}
             @endif
                >{{$category->name}}</option>
        @endforeach
      </select>
      </div>
      <div class="form-group">
        <textarea name="content" value="" id="" cols="30" rows="6">{{$post[0]->content}}</textarea>
      </div>
      <div class="form-group text-center">
          <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </form>
</div>

@endsection