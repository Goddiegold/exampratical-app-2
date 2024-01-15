<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
            'title',
            'description',
            'level',
            'due_date',
            'user_id'
    ];
}
