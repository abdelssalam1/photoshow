<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\photo;
use Illuminate\Support\Facades\Storage;


class photosController extends Controller
{
    public function index()
    {
        return view('photos.index');
         
    }

    public function create($album_id)
    {
        return view('photos.create',compact('album_id'));
         
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'photo' => 'image|max:3999',
        ]);
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' .$extension;
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenameToStore);

        $photo = new photo();
        $photo->title = request('title');
        $photo->album_id = request('album_id');
        $photo->description = request('description');
        $photo->size = request('photo')->getClientSize(); 
        $photo->photo = $filenameToStore;
        $photo->save();

        return redirect('/albums/'.request('album_id'))->with('success','photo uploaded');
    
    }
    public function show($id)
    {
        $photo = photo::find($id);
        return view('photos.show', compact('photo'));
    }
    public function destroy($id)
    {
        $photo = photo::find($id);
        Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo);
        
        $photo->delete();
        return redirect('/')->with('success','photo deleted');
    

    }
}
