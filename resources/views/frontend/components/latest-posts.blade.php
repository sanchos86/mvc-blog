<div class="mb-4">
    @foreach($latestPosts as $post)
        @include('frontend.components.post-preview', ['type' => 'aside', 'post' => $post])
    @endforeach
</div>
