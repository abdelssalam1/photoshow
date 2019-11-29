@extends('layouts.app')
@section('content')
<h3>{{$photo->title}}</h3>
<p>{{$photo->description}}</p>
<a href="/albums/{{$photo->album_id}}">Back To Album</a>
<hr>

<div class="container">
    <img class="col-9" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">

</div>

<form action="/photos/{{$photo->id}}" method="post">
    @csrf
    @method('delete')
    <br>
    <button type="submit" class="btn btn-danger">Delete</button>
<small>size: {{$photo->size}}</small>
</form>
@endsection