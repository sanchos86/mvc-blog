<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Services\TagService;

class TagsComposer
{
    private $tagsService;

    public function __construct(TagService $tagService)
    {
        $this->tagsService = $tagService;
    }

    public function compose(View $view)
    {
        $view->with('tags', $this->tagsService->getAll());
    }
}
