@extends('layouts.app')
@section('content')
<div class="form-section">
    <form action="{{route('category.add')}}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" id="">
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
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><a href="/category/delete/{{$category->id}}"><button type="submit" class="btn btn-warning">Delete</button></a> &nbsp; <a href="/category/edit/{{$category->id}}"><button type="submit" class="btn btn-danger">Edit</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection