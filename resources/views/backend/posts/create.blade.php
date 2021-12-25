@extends('backend.layouts.internal')

@section('content-internal')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1>Добавить запись</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form
                    action="{{ route('posts-store') }}"
                    method="post"
                    enctype="multipart/form-data"
                    name="create-post-form"
                >
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок</label>
                        <input value="{{ old('title') }}" type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Ярлык</label>
                        <input value="{{ old('slug') }}" type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Описание (meta description)</label>
                        <textarea
                            class="form-control @error('meta_description') is-invalid @enderror"
                            name="meta_description"
                            id="meta_description"
                            cols="30"
                            rows="5"
                            required
                        >{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Категория</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Теги</label>
                        <select class="form-select @error('tags') is-invalid @enderror" name="tags[]" id="tags" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Картинка</label>
                        <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture" name="picture">
                        @error('picture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Содержание</label>
                        <div id="create-post-quill-editor" style="min-height: 400px;"></div>
                        <input type="hidden" name="plain_text">
                        <textarea class="form-control" id="text" name="text" rows="3" style="display: none;"></textarea>
                        @error('text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input @error('publish') is-invalid @enderror" type="checkbox" id="publish" name="publish">
                                <label class="form-check-label" for="publish">Опубликовать</label>
                                @error('publish')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
