<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};
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
        'plain_text',
        'meta_title',
        'meta_description',
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

    protected static function booted()
    {
        static::addGlobalScope('desc', function (Builder $builder) {
            return $builder->orderBy('id', 'desc');
        });
    }
}
