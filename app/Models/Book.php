<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'publisher',
        'author',
        'title',
        'genre',
        'category',
        'description',
        'or_level',
        'image'
    ];

    public function genres()  
    {
        return $this->belongsToMany(Genre::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
