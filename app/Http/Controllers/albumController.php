<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class albumController extends Controller
{
    public function index()
    {
        return view('albums.index');
         
    }
    
    public function create()
    {
        return view('albums.create');
         
    }
}
