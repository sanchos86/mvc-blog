<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagService
{
    public function getAll(): Collection
    {
        return Tag::all();
    }
}
