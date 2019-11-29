@extends('layouts.app')

{{-- @section('title')
album gallery  
@endsection --}}


@section('content')




{{-- authentication
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}



    <h1>Albums Index</h1>
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if ($albums)
    
        <div class="container">
            <div class="row">
                @foreach ($albums as $album)
                    <div class="col-xl-4">
                    <a href="/albums/{{$album->id}}">
                            <h3>{{$album->name}}</h3>
                            <img class="img-fluid" src="/storage/album_covers/{{$album->cover}}" alt="hellllloooooooo">
                        </a>
                    </div>
                    
                @endforeach        
            </div>
        
        </div>        
    @endif

@endsection
