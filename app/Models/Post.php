<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'author_first_name',
        'author_last_name',
        'file_path',
        'p_status',
        'p_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFilePathAttribute($value)
    {
        return asset("images/" . $value);
    }
}
