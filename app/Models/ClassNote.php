<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassNote extends Model
{
    protected $fillable = [
        'title',
        'class_topics',
        'class_objectives',
        'date',
        'studentId',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    public function formclass()
    {
        return $this->belongsTo(FormClass::class,'form_class_id');
    }
}
