@extends('layouts.app')
@section('content')
<h1>{{$album->name}}</h1>

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>   
@endif

<a href="/" class="btn btn-secondary">Go back</a>
<a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload photo to album</a>  


    @if ($album->photos)
        <div class="container">
            <div class="row">
                @foreach ($album->photos as $photo)
                    <div class="col-xl-4">
                    <a href="/photos/{{$photo->id}}">
                            <h3 class="text-center">{{$photo->title}}</h3>
                    <img class="img-fluid" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="hellllloooooooo">
                        </a>
                        
                    </div>
                    
                    
                @endforeach  
                     
            </div>
            <hr>
            <form action="/albums/{{$album->id}}" method="post">
                @csrf
                @method('delete')
                <br>
                <button type="submit" class="btn btn-danger">Delete The Album</button>
            </form> 
    @endif   

@endsection