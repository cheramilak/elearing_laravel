<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    use HasFactory;

    public function students(){
        return $this->belongsTo(User::class,'student_id');
    }

    public function teachers(){
        return $this->belongsTo(User::class,'teacher_id');
    }
}
