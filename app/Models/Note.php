<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'date',
        'objectives_comments',
        'reading_ability_progress',
        'vipers_progress',
        'class_objectives',
        'student_id'
    ];


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }

    public function classnote()
    {
        return $this->hasOne(ClassNote::class);
    }
}
