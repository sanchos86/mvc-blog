@extends('layouts.frontend')

@section('title')
    {{ $title }} | {{ config('app.name') }}
@endsection

@section('content')
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-4 mb-lg-0">
        @include('frontend.components.heading', ['level' => 1, 'headingTitle' => $headingTitle, 'class' => 'mb-4', 'bordered' => true])
        <div class="row">
            @forelse($posts as $post)
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    @include('frontend.components.post-preview', ['post' => $post, 'withControl' => true, 'type' => 'default'])
                </div>
            @empty
                <div class="col-12">
                    @include('frontend.components.nothing-found')
                </div>
            @endforelse
        </div>
        {{ $posts->links() }}
    </div>
@endsection
