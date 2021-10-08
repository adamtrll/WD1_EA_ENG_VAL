<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
        'content', 'topic_id',
    ];

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

}
