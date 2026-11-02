<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'score',
        'total_questions',
    ];

    // Ek attempt ek student (user) ka hota hai
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Ek attempt ek course ka hota hai
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}