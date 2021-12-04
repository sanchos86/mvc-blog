<div class="d-flex flex-wrap mb-4">
    @foreach($tags as $tag)
        @include('frontend.components.tag', ['tag' => $tag, 'rounded' => true, 'size' => 'normal'])
    @endforeach
</div>
