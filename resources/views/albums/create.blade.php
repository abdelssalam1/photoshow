@extends('layouts.app')
@section('title')
    create album
@endsection

@section('content')
<br>    
<h1>Album create</h1>

<form action="/albums/store" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name">
          @if ($errors->first('name'))
          <div class="alert alert-danger">{{$errors->first('name')}}</div>
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
            <label for="cover">Cover Image</label>
            <input name="cover" type="file" class="form-control" id="cover" placeholder="cover image">
            @if ($errors->first('cover'))
            <div class="alert alert-danger">{{$errors->first('cover')}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection