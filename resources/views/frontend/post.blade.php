@extends('layouts.frontend')

@section('title')
    {{ $post->title }} | {{ config('app.name') }}
@endsection

@section('meta')
    @include('frontend.components.meta')
@endsection

@section('content')
    <article class="col-12 col-sm-12 col-md-12 col-lg-8 mb-4 mb-lg-0 post">
        <header class="post__header">
            <h1 class="post__title">{{ $post->title }}</h1>
            <div class="post__meta">
                <a href="{{ route('posts-by-category', ['category' => $post->category]) }}" class="post__category-link">
                    {{ $post->category->name }}
                </a>
                <span class="post__date">{{ \Illuminate\Support\Carbon::parse($post->published_at)->locale('ru')->isoFormat('LL') }}</span>
            </div>
        </header>
        <div class="post__thumb">
            <img class="post__img" src="{{ $post->src ? asset( 'storage/' . $post->src) : config('misc.fallback_image_url') }}" alt="{{ $post->title }}">
        </div>
        <div class="post__content">
            @include('frontend.components.post-content', ['content' => $post->text])
        </div>
        @if($post->tags->count())
            <footer class="post__footer">
                <div class="d-flex flex-wrap">
                    @foreach($post->tags as $tag)
                        @include('frontend.components.tag', ['tag' => $tag, 'rounded' => true, 'size' => 'small'])
                    @endforeach
                </div>
            </footer>
        @endif
    </article>
@endsection

