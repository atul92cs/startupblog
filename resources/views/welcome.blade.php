@extends('layouts.main')
@section('content')
<div class="header-section">
 <div class="flex-container">
   <div class="text-section">
     <div class="main-section">
      <h3>Startup Blog</h3>
      <p class="lead"><span class="txt-type" data-wait="3000" data-words='["Insight","Start-up","MSME","KYT","The talk"]'></p>
     </div>  
   </div>
   <div class="image-section">
     <img src="{{asset('/images/logo.jpeg')}}" alt="">
   </div>
 </div>
</div>
<div class="product-section">
 <h3>Our Latest Stories</h3>
 <div class="products-row">
     @foreach($posts as $post)
      <div class="product-item">
        <img src="{{asset('/storage/posts_images/'.$post->picture)}}" alt="">
        <h5>{{$post->title}}</h5>
        <a href="/post/getpost/{{$post->id}}"><button class="btn btn-primary">View</button></a>
      </div>
     @endforeach

 </div>
</div>
<div class="contact-section">
  <h3>Contact Us</h3>
  <div class="contact-flex">
    <div class="text-section">
       <div class="head-office">
         <h5>Head Office</h5>
         <p>15,Seseme street</p>
       </div>
       <div class="brand-store">
         <h5>Brand Store</h5>
         <p>P.shermen ,42, sydney
         </p>
       </div>
    </div>
    <div class="form-section">
        @include('messages.info')
       <form action="{{route('contact.add')}}" method="post">
         @csrf
         <div class="form-group">
           <input type="text" name="name" class="form-control" placeholder="Name" id="">
         </div>
         <div class="form-group">
           <input type="email" name="email" class="form-control" placeholder="Email" id="">
         </div>
         <div class="form-group">
           <input type="tel" name="phone" class="form-control" placeholder="Phone" id="">
         </div>
         <div class="form-group">
           <textarea name="message" id="" cols="30" placeholder="Message" class="form-control" rows="5"></textarea>
         </div>
         <div class="form-group text-center">
           <button class="btn btn-primary">Submit</button>
         </div>
       </form>
    </div>
  </div>
 </div>

@endsection