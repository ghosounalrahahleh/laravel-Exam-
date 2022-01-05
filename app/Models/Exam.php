<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function results(){
        return $this->hasMany(Result::class);
    }
}
