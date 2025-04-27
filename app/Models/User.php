<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'role',
        'or_level',
        'current_book_name',
        'interests',
        'topic',
        'class',
        'book_id',
        'assigned_class'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }


    public function class()
    {
        return $this->belongsTo(FormClass::class, 'assigned_class','id');
    }

}
