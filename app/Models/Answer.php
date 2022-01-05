<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;


    public function question(){
        return $this->belongsTo(Question::class);
    }
    protected $fillable =['answer','correct','question_id'];
}
