<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Exception\CommonMarkException;

class Chapter extends Model
{
    protected $fillable = ['title', 'content', 'book_id'];

    /**
     * @throws CommonMarkException
     */
    public function getFormattedContentAttribute()
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'allow', // Allow embedded HTML
            'allow_unsafe_links' => false,
        ]);
        return $converter->convert($this->content);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
