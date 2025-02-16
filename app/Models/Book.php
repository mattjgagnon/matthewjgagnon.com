<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description'];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($book) {
            $book->slug = Str::slug($book->title);
        });

        static::updating(function ($book) {
            $book->slug = Str::slug($book->title);
        });
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
