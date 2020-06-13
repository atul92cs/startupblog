@extends('layouts.app')
@section('content')
<div class="top-section">
    <h3>{{$id}}</h3>
    <a href="/home" class="btn btn-secondary">Go Back</a>
    <a href="/photo/add/{{$id}}" class="btn btn-primary">Upload Photo</a>
</div>
<div class="pic-section">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Source</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img src="{{asset('public/posts_images/'.$photo->source)}}" alt=""></td>
                <td><a href="/photo/delete/{{$photo->id}}"><button class="btn btn-primary">Delete</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection