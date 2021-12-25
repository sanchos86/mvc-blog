@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <form action="{{ route('login') }}" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="email">Электронная почта</label>
                        <input
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            type="email"
                            name="email"
                            id="email"
                            required
                        />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Пароль</label>
                        <input
                            class="form-control @error('password') is-invalid @enderror"
                            type="password"
                            name="password"
                            id="password"
                            required
                        />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
