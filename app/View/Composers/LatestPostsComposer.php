<?php

namespace App\View\Composers;

use App\Services\PostService;
use Illuminate\View\View;

class LatestPostsComposer
{
    private $postsService;

    public function __construct(PostService $postService)
    {
        $this->postsService = $postService;
    }

    public function compose(View $view)
    {
        $view->with('latestPosts', $this->postsService->getLatest());
    }
}
