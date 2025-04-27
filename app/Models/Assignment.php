<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'answer_content'
    ];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function AssignmentQuestions()
    {
        return $this->hasMany(AssignmentQuestions::class);
    }
}
