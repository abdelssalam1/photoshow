<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\album;

use Illuminate\Support\Facades\Storage;

class albumsController extends Controller
{
    public function index()
    {   
        $albums = album::all();
        return view('albums.index', compact('albums'));
         
    }
    
    public function create()
    {
        return view('albums.create');
         
    }

    public function store(Request $request)
    {
        // dd(request()->get('cover'));
        $data = request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'cover' => 'image|max:3999',
        ]);
        $filenameWithExt = $request->file('cover')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' .$extension;
        $path = $request->file('cover')->storeAs('public/album_covers',$filenameToStore);

        $album = new album();
        $album->name = request('name');
        $album->description = request('description');
        $album->cover = $filenameToStore;
        $album->save();

        return redirect('/')->with('success','album created');
    }
    public function show($id)
    {
        $album = album::with('photos')->find($id);
        return view('albums.show',compact('album'));    
    }
    
    public function destroy($id)
    {
        $album = album::find($id);
        Storage::delete('public/album_covers/'.$album->cover);
        foreach($album->photos as $photo)
        {
            Storage::delete('public/photos/'.$album->id.'/'.$photo->photo);
            $photo->delete();
        }
        
        $album->delete();
        return redirect('/')->with('success','album deleted');
        

    }
}
