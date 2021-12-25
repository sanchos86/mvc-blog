@extends('backend.layouts.internal')

@section('content-internal')
    <div class="container pt-4 pb-2">
        <div class="row align-items-center">
            <div class="col-6">
                <h1>Записи</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-primary" href="{{ route('posts-create') }}">Добавить запись</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Заголовок</th>
                            <th>Ярлык</th>
                            <th>Категория</th>
                            <th class="text-nowrap">Дата публикации</th>
                            <th>Теги</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->published_at ? \Illuminate\Support\Carbon::parse($post->published_at)->locale('ru')->isoFormat('LL') : '-' }}</td>
                                <td>{{ $post->tags->isNotEmpty() ? $post->tags->implode('name', ', ') : '-' }}</td>
                                <td>
                                    <div class="inline-flex flex-column">
                                        <a href="{{ route('posts-edit', ['post' => $post]) }}" class="btn btn-primary btn-sm mb-2">Редактировать</a>
                                        <form action="{{ route('posts-publish', ['post' => $post]) }}" method="post" class="mb-2">
                                            <button type="submit" class="btn btn-primary btn-sm">{{ $post->published_at ? 'Скрыть' : 'Опубликовать' }}</button>
                                            @csrf
                                            @method('patch')
                                        </form>
                                        <form action="{{ route('posts-destroy', ['post' => $post])}}" method="post">
                                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Ничего не найдено</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
