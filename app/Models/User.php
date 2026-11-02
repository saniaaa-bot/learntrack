<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Naya column (instructor ya student)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Ek user (instructor) ke bohat se courses ho sakte hain
    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    // Ek user (student) ke bohat se attempts ho sakte hain
    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }
}