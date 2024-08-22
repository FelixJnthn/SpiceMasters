<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];

    public function difficultyQuestions()
    {
        return $this->hasMany(Question::class);
    }
}
