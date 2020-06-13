@extends('layouts.app')

@section('content')
<div class="container">
<div id="form-section">
 <form action="{{route('category.update')}}" method="post">
  @csrf
  <div class="form-group">
   <input type="hidden" name="id" value="{{$category[0]->id}}">
  </div>
  <div class="form-group">
  <input type="text" name="name" class="form-control" value="{{$category[0]->name}}">
  </div>
  <div class="form-group text-center">
  <button type="submit" class="btn btn-primary">Update</button>
  </div>
 </form>
</div>
</div>
@endsection