<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Assignment;
use App\Models\AssignmentQuestions;

class AssignmentQuestionsController extends Controller
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

    public function createassignmentquestions($book_id)
    {
        $questions = Question::where('book_id', $book_id)->get();
        return response()->json(['questions' => $questions]);
    }

    public function viewassignmentquestions($id)
    {
        $assignmentquestions = AssignmentQuestions::where('assignment_id', $id)->with('question')->with('assignment')->with('assignment.student')->get();
        return view('assignmentquestions.form', ['assignmentquestionslist' => $assignmentquestions]);
    }

    public function updateanswerquestions(Request $request)
    {
        $questions = $request->input('questions'); // Retrieve all questions
        $book_id = $request->input('book_id'); // Retrieve all questions

        foreach ($questions as $question) {

            $assignmentQuestion = AssignmentQuestions::find($question['id']);
            $assignmentId = $assignmentQuestion->assignment_id;


            if (!empty($question['id']) && isset($question['answer_field'])) {
                // Find the assignment question by ID
                $assignmentQuestion = AssignmentQuestions::find($question['id']);
                if ($assignmentQuestion) {
                    // Save the answer
                    $assignmentQuestion->answer_field = $question['answer_field'];
                    $assignmentQuestion->save();
                    $assignmentId = $assignmentQuestion->assignment_id;
                }
            }
        }
        if ($assignmentId) {
            $assignment = Assignment::find($assignmentId);
            $assignment->book_id = $book_id;


            if ($assignment) {
                if ($assignment->status == 'Not Completed') {
                    // First submission: change to Pending Feedback
                    $assignment->status = 'Pending Feedback';
                }

                // If feedback is provided and status is Pending Feedback, mark as Completed
                if ($assignment->status == 'Pending Feedback' && $request->filled('feedback')) {
                    $assignment->vocabulary = $request->vocabulary;
                    $assignment->inference = $request->inference;
                    $assignment->prediction = $request->prediction;
                    $assignment->explanation = $request->explanation;
                    $assignment->retrieval = $request->retrieval;
                    $assignment->summarise = $request->summarise;
                    $assignment->feedback = $request->feedback;
                    $assignment->status = 'Completed';
                }

                $assignment->save();
            }
        }
        return redirect()->route('assignments');
    }
}