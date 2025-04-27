<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormClass extends Model
{
    protected $table = 'form_classes';
    protected $fillable = [
        'class_name',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'assigned_class')->where('role', 'student');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'teacher_id', 'id');
    }

    public function classnotes()
    {
        return $this->hasMany(ClassNote::class);
    }
}
