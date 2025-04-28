<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class QuestionController extends Controller
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

    public function viewquestions()
    {
        $data = Question::with('Book')->orderBy('question_text', 'asc')->get();
        return view('questions.list', ['questionslist' => $data]);
    }

    public function viewquestion($id)
    {
        $data = Question::orderBy('question_text', 'asc')->get();
        return view('questions.list', ['questions_list' => $data, 'selectedid' => $id]);
    }

    public function createquestion()
    {
        $books = Book::orderBy('title', 'asc')->get();
        return view('questions.form', ['bookslist' => $books]);
    }

    public function questionstore(Request $request)
    {
        $request->validate([
            'question_text' => ['required'],
            'question_type' => ['required'],
            'book_id' => ['required'],
        ]);
        $question = new Question();
        $question->question_text = $request->question_text;
        $question->question_type = $request->question_type;
        $question->book_id = $request->book_id;
        $question->teacher_id = $request->teacher_id;
        $question->save();
        return redirect()->route('questions');
    }

    public function editquestion($id)
    {
        $question = Question::with('Book')->find($id);
        return view('questions.form', ['question' => $question]);
    }

    public function updatequestion(Request $request)
    {
        $request->validate([
            'question_text' => ['nullable'],
            'question_type' => ['nullable']
        ]);
        $id = $request->id;
        $question = Question::find(id: $id);

        $question->update($request->only('question_text', 'question_type'));
        return redirect()->route('questions');
    }

    public function deletequestion($id)
    {
        Question::destroy($id);
        return redirect()->route('questions');
    }
}
