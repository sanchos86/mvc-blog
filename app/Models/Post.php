<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};

class Post extends Model
{
    use HasFactory;

    protected $perPage = 6;

    protected $fillable = [
        'title',
        'text',
        'slug',
        'category_id',
        'published_at',
        'src',
        'plain_text'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @param bool $publish
     */
    public function togglePublish(bool $publish): void
    {
        $this->published_at = $publish ? date('Y-m-d') : null;
        $this->save();
    }
}
