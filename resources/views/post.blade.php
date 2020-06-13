@extends('layouts.second')
@section('content')
<div class="container">
 <div class="prod-main-section">
  <div class="gallery-section">
     <div class="main-img">
      <img src="{{asset('storage/posts_images/'.$post[0]->picture)}}" alt="" id="current" >
     </div>
     <div class="imgs">
     @foreach($photos as $photo)
     
     <img src="{{asset('storage/posts_image/'.$photo->source)}}">
     
     @endforeach
     </div>
  </div>
  <div class="info-section">
   <h4>{{$post[0]->title}}</h4>
    <div class="about-section">
      <p>{{$post[0]->content}}</p> 
    </div>
   
</div>

@endsection