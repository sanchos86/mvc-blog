<a href="{{ route('posts-by-tag', ['tag' => $tag]) }}" @class(['tag', 'tag--size-' . $size, 'tag--rounded' => $rounded])>#{{ $tag->name }}</a>
