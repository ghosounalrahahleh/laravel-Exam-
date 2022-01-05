<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function uanswers(){
        return $this->hasMany(Uanswer::class);
    }

    protected $fillable =['result','user_id','exam_id'];

}
