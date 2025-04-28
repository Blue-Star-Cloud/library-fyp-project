<?php

namespace App\Http\Controllers;

use App\Models\ClassNote;
use App\Models\FormClass;
use App\Models\User;
use Illuminate\Http\Request;

class ClassNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function classnotesindex($user_id)
    {
        $user = User::find($user_id);
        if ($user->role == 'teacher') {
            $class = FormClass::where('teacher_id', $user->id)->first();
        } elseif ($user->role == 'student') {
            $class = FormClass::where('id', $user->assigned_class)->first();
        } elseif ($user->role == 'admin') {
            $data = ClassNote::with('formclass')->orderBy('id', 'desc')->get();
            return view('class_notes.list', ['classnoteslist' => $data]);
        }
        $data = ClassNote::where('form_class_id', $class->id)->orderBy('id', 'desc')->get();
        return view('class_notes.list', ['classnoteslist' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function classnotecreate($user_id)
    {
        $teacher_user = User::find($user_id);
        $class = FormClass::where('teacher_id', $teacher_user->id)->orderBy('class_name', 'asc')->first();
        return view('class_notes.form', ['teacher_user' => $teacher_user, 'class' => $class]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function classnotestore(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'date' => ['required'],
            'class_topics' => ['required'],
            'class_objectives' => ['required'],
        ]);
        $classnote = new ClassNote();
        $classnote->title = $request->title;
        $classnote->date = $request->date;
        $classnote->class_topics = $request->class_topics;
        $classnote->class_objectives = $request->class_objectives;
        $classnote->teacher_id = $request->teacher_id;
        $classnote->form_class_id = $request->form_class_id;
        $classnote->save();
        return redirect()->route('classnotesindex', ['user_id' => $request->teacher_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function classnoteedit($id)
    {
        $note = ClassNote::find($id);
        return view('class_notes.form', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function classnoteupdate(Request $request)
    {
        $request->validate([
            'content' => ['nullable']
        ]);
        $id = $request->id;
        $note = ClassNote::find(id: $id);
        $note->update($request->only('title', 'content'));
        return redirect()->route('classnotesindex', ['user_id' => $request->teacher_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function classnotedelete($id, $user_id)
    {
        ClassNote::destroy($id);
        return redirect()->route('classnotesindex', ['user_id' => $user_id]);
    }
}
