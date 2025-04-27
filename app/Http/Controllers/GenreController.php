<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Genre::all();
        return view( 'genre.list',['genrelist'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creategenre()
    {
        return view( 'genre.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function genrestore(Request $request)
    {
        //dd($request);
        $request->validate([
            'genre_name' => ['required'],
        ]);
        $genre = new Genre();
        $genre->genre_name = $request->genre_name;
        $genre->save();
        return redirect()->route('genres');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editgenre($id)
    {
        $genre = Genre::find($id);
        return view('genre.form',['genre'=>$genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updategenre(Request $request)
    {
        //dd($request);
        $request->validate([
            'genre_name' => ['required']
        ]);
        $id = $request->id;
        $genre = Genre::find(id: $id);
        $genre->update($request->all());
        return redirect()->route('genres');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletegenre($id)
    {
        Genre::destroy($id);
        return redirect()->route('genres');
    }
}
