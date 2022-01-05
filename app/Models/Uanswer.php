<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uanswer extends Model
{
    use HasFactory;

    public function result(){
        return $this->belongsTo(Result::class);
    }
    protected $fillable =['user_answer','result_id'];

}
