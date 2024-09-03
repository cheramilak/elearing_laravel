<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTutorial extends Model
{
    use HasFactory;

    protected $casts = [
        'schedule' => 'array',
        'selected_subjects' => 'array',
    ];
}
