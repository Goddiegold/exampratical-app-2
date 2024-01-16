<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
}
