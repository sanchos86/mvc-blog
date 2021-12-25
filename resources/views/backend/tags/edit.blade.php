@extends('backend.layouts.internal')

@section('content-internal')
    <div class="container pt-4">
        <div class="row">
            <div class="col-12">
                <h1>Редактировать тег</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('tags-update', ['tag' => $tag]) }}" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input
                            value="{{ old('name') ? old('name') : $tag->name }}"
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            minlength="3"
                            required
                        >
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Ярлык</label>
                        <input
                            value="{{ old('slug') ? old('slug') : $tag->slug }}"
                            type="text"
                            name="slug"
                            id="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            minlength="3"
                            required
                        >
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
                        >{{ old('meta_description') ? old('meta_description') : $tag->meta_description }}</textarea>
                        @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                    @csrf
                    @method('patch')
                </form>
            </div>
        </div>
    </div>
@endsection
