<article @class(['post-preview', 'mb-4', isset($type) && is_string($type) ? 'post-preview--' . $type : ''])>
    <a class="post-preview__thumb" href="{{ route('post-by-slug', ['post' => $post]) }}">
        <img
            class="post-preview__img"
            src="{{ $post->src ?: 'https://via.placeholder.com/640x360.png' }}"
            alt="{{ $post->title }}"
        >
    </a>
    <div @class(['post-preview__data', 'mb-2' => isset($withControl) && $withControl])>
        <h6 class="post-preview__title">
            <a class="post-preview__link" href="{{ route('post-by-slug', ['post' => $post]) }}">{{ $post->title }}</a>
        </h6>
        <span class="post-preview__date">
            {{ \Illuminate\Support\Carbon::parse($post->published_at)->locale('ru')->isoFormat('LL') }}
        </span>
        @if(isset($type) && $type === 'default' && is_string($post->plain_text))
            <p class="post-preview__text">{{ \Illuminate\Support\Str::limit($post->plain_text, 75) }}</p>
        @endif
    </div>
    @if(isset($withControl) && $withControl)
        <div class="post-preview__control">
            <a class="link-button" href="{{ route('post-by-slug', ['post' => $post]) }}">Читать далее</a>
        </div>
    @endif
</article>
