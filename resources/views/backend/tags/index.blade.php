@extends('backend.layouts.internal')

@section('content-internal')
    <div class="container pt-4">
        <div class="row align-items-center">
            <div class="col-6">
                <h1>Теги</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-primary" href="{{ route('tags-create') }}">Добавить тег</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Название</th>
                            <th scope="col">Ярлык</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td>
                                    <div class="d-inline-flex align-items-center">
                                        <a class="btn btn-primary btn-sm me-2" role="button" href="{{ route('tags-edit', ['tag' => $tag]) }}">Редактировать</a>
                                        <form action="{{ route('tags-destroy', ['tag' => $tag]) }}" method="post">
                                            <button class="btn btn-danger btn-sm">Удалить</button>
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
