<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterFeedback extends Model
{
    use HasFactory;

    protected $fillable = ['chapter_id', 'name', 'email', 'message'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
