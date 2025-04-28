<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Book;
use Auth;

class ReviewController extends Controller
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
    public function reviewlist()
    {
        if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin') {
            $data = Review::with('student', 'book')->orderBy('id', 'desc')->get();
        } else {
            $data = Review::with([
                'student' => function ($query) {
                    $query->where('role', 'student');
                },
                'book'
            ])
                ->where('student_id', auth()->id()) // Filter reviews where user_id matches the logged-in user
                ->orderBy('id', 'desc')
                ->get();
        }
        return view('reviews.list', ['reviewslist' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createreview($student_id)
    {
        $bookslist = Book::orderBy('title', 'asc')->get();
        $student = User::where('id', $student_id)->first();
        return view('reviews.form', compact('bookslist', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storereview(Request $request)
    {
        $request->validate([
            'book_id' => ['required'],
            'rating' => ['required'],
            'comment_text' => ['required'],
        ]);
        $review = new Review();
        $review->book_id = $request->book_id;
        $review->student_id = $request->student_id;
        $review->rating = $request->rating;
        $review->comment_text = $request->comment_text;
        $review->save();
        return redirect()->route('reviews');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function showBookReview($book_id)
    {
        $data = Review::with([
            'student' => function ($query) {
                $query->where('role', 'student');
            },
            'book'
        ])
            ->where('book_id', $book_id) // Filter reviews where user_id matches the logged-in user
            ->get();


        return view('reviews.list', ['reviewslist' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editreview($id)
    {
        $review = Review::find($id);
        return view('reviews.form', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatereview(Request $request)
    {
        $request->validate([
            'comment_text' => ['nullable']
        ]);
        $id = $request->id;
        $note = Review::find(id: $id);
        $note->update($request->only('rating', 'comment_text'));
        return redirect()->route('reviews');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletereview($id)
    {
        Review::destroy($id);
        return redirect()->route('reviews');
    }
}
