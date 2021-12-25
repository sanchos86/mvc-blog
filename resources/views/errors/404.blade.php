@extends('layouts.frontend')

@section('title')
    404 | {{ config('app.name') }}
@endsection

@section('content')
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-4">
        <div class="d-flex flex-column align-items-center">
            @include('frontend.components.heading', ['level' => 4, 'headingTitle' => 'По запросу /' . request()->path() . ' ничего не найдено', 'bordered' => false, 'class' => 'mb-2'])
            <a class="link-button" href="{{ route('home') }}">На главную</a>
        </div>
    </div>
@endsection
