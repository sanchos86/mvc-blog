@extends('backend.layouts.internal')

@section('content-internal')
    <div class="container pt-4">
        <div class="row align-items-center">
            <div class="col-6">
                <h1>Категории</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-primary" href="{{ route('categories-create') }}">Добавить категорию</a>
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="d-inline-flex align-items-center">
                                    <a class="btn btn-primary btn-sm me-2" role="button" href="{{ route('categories-edit', ['category' => $category]) }}">Редактировать</a>
                                    <form action="{{ route('categories-destroy', ['category' => $category]) }}" method="post">
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
