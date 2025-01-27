<?php

namespace App\Http\Controllers;

use App\Models\Book;
//use App\Http\Requests\StoreBooksRequest;
use Illuminate\Http\Request;
//use App\Http\Requests\UpdateBooksRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::all();
        return view( 'books.list',['bookslist'=>$data]);
    }

    public function tindex()
    {
        $data = Book::all();
        return view( 'books.workinglist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createbook()
    {
        return view( 'books.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function bookstore(Request $request)
    {
        //dd(vars: $request);
        $book = new Book();
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->title = $request->title;
        $book->genre = $request->genre;
        $book->category = $request->category;
        $book->description = $request->description;
        $book->or_level = $request->or_level;
        $book->save();
        return redirect()->route('books');
    }

    /**
     * Display the specified resource.
     */
    public function show( $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editbook( $id)
    {
        $book = Book::find($id);
        return view('books.form',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatebook(Request $request)
    {
        $request->validate([
            'title' => ['nullable']
        ]);
        $id = $request->id;
        $book = Book::find(id: $id);
        $book->update($request->all());
        //dd($note);
        //$note->update($request->all());
        //$book->update($request->only('title', 'content'));
        //$note->update($request->all()->except(['title', 'content']));
        //$note->update($request->title);
        //$note->update($request->all());
        //User::where($id)->update($request->User);
        return redirect()->route('books');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function deletebook($id)
    {
        //$book = Book::find($id);
        //$book->delete();
        Book::destroy($id);
        return redirect()->route('books');

    }
}
