@extends('layouts.app')
@section('title')
    create album
@endsection

@section('content')
<br>    
<h1>Upload photo</h1>

<form action="/photos/store" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="album_id" value = {{$album_id}}>
        <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="image title">
                @if ($errors->first('title'))
                <div class="alert alert-danger">{{$errors->first('title')}}</div>
                @endif
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input name="description" type="text" class="form-control" id="description" placeholder="description">
          @if ($errors->first('description'))
          <div class="alert alert-danger">{{$errors->first('description')}}</div>
          @endif
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input name="photo" type="file" class="form-control" id="cover" placeholder="photo">
            @if ($errors->first('photo'))
            <div class="alert alert-danger">{{$errors->first('photo')}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
</form>

@endsection