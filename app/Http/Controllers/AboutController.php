<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.about', [
            'meta' => [
                'description' => __('meta.about.description'),
            ],
        ]);
    }
}
