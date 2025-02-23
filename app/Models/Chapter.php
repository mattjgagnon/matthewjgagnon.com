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

    public function getPaginatedContent(int $page = 1, int $wordsPerPage = 250): array
    {
        $words = preg_split('/\s+/', strip_tags($this->formatted_content));
        $totalPages = ceil(count($words) / $wordsPerPage);

        $start = ($page - 1) * $wordsPerPage;
        $content = implode(' ', array_slice($words, $start, $wordsPerPage));

        return [
            'content' => $content,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ];
    }

    public function getTotalWords(): array|int
    {
        return str_word_count(strip_tags($this->formatted_content));
    }
}
