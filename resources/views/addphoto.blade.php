@extends('layouts.app')
@section('content')
<div class="form-section">

<form action="{{route('photo.add')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="hidden" name="post_id" value="{{$post_id}}">
    </div>
    <div class="form-group">
        <input type="file" class="form-control" name="source" id="">
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>

</form>
</div>
@endsection