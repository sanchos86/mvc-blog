<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Services\CategoryService;

class CategoriesComposer
{
    private $categoriesService;

    public function __construct(CategoryService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categoriesService->getAll());
    }
}
