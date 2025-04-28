<?php

namespace App\Http\Controllers;

use App\Models\FormClass;
use App\Models\User;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
            $data = Assignment::with('student', 'teacher', 'book')->where('status', '<>', 'Completed')->orderby('id', 'desc')->limit(5)->get();
        else
            $data = Assignment::with('student', 'teacher', 'book')->where('student_id', auth()->id())->where('status', '<>', 'Completed')->orderby('id', 'desc')->limit(5)->get();

        $studentCount = User::where('role', 'student')->count();
        $teacherCount = User::where('role', 'teacher')->count();
        $totalBooks = Book::count();
        $totalReviews = Review::count();
        $totalAssignments = Assignment::count();
        $totalQuestions = Question::count();
        $totalClasses = FormClass::count();
        $totalGenres = DB::table('books')->distinct('category')->count('category');
        
        return view('dashboard', ['assignmentslist' => $data, 'studentCount' => $studentCount, 'teacherCount' => $teacherCount, 'totalBooks' => $totalBooks, 'totalReviews' => $totalReviews, 'totalAssignments' => $totalAssignments, 'totalQuestions' => $totalQuestions, 'totalClasses' => $totalClasses, 'totalGenres' => $totalGenres]);
    }


    public function getChartData()
    {
        // Fetch class names
        $classes = FormClass::pluck('class_name', 'id');

        // Count users in each class
        $classData = User::whereNotNull('assigned_class')
            ->selectRaw('assigned_class, COUNT(*) as total_students')
            ->groupBy('assigned_class')
            ->get();

        // Prepare response for chart
        $data = [
            'categories' => [], // X-axis labels (class names)
            'series' => [] // Y-axis values (number of students)
        ];

        foreach ($classData as $item) {
            $data['categories'][] = $classes[$item->assigned_class] ?? 'Unknown';
            $data['series'][] = $item->total_students;
        }

        return response()->json($data);
    }

    public function getBookData()
    {
        // Fetch book names
        $books = Book::pluck('title', 'id');

        // Count reviews for each book
        $bookData = Review::selectRaw('book_id, COUNT(*) as total_reviews')
            ->groupBy('book_id')
            ->get();

        // Prepare response for chart
        $data = [
            'categories' => [], // X-axis labels (book titles)
            'series' => [] // Y-axis values (number of reviews)
        ];

        foreach ($bookData as $item) {
            $data['categories'][] = $books[$item->book_id] ?? 'Unknown';
            $data['series'][] = $item->total_reviews;
        }

        return response()->json($data);
    }

    public function getReviewData()
    {
        // Fetch student names
        $students = User::where('role', 'student')->pluck('name', 'id');

        // Count reviews for each student
        $reviewData = Review::selectRaw('student_id, COUNT(*) as total_reviews')
            ->groupBy('student_id')
            ->get();

        // Prepare response for chart
        $data = [
            'categories' => [], // X-axis labels (student names)
            'series' => [] // Y-axis values (number of reviews)
        ];

        foreach ($reviewData as $item) {
            $data['categories'][] = $students[$item->student_id] ?? 'Unknown';
            $data['series'][] = $item->total_reviews;
        }

        return response()->json($data);
    }

    public function getBookCategoryData()
    {

        $books = Genre::withCount('book')->get();
        $chartData = [];

        foreach ($books as $book) {
            $chartData[] = [
                'name' => $book->genre_name,
                'y' => $book->book_count,
            ];
        }

        return response()->json($chartData);
    }
}
