@extends('layouts.frontend')

@section('title')
    О блоге | {{ config('app.name') }}
@endsection


@section('content')
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-4">
        @include('frontend.components.heading', ['level' => 1, 'headingTitle' => 'О блоге', 'class' => 'mb-4', 'bordered' => true])
        <div class="about">
            <div class="about__photo-wrap mr-4">
                <img class="about__photo" src="{{ asset('images/photo.jpg') }}" alt="">
            </div>
            <div class="about__info">
                <p class="about__text mb-3">
                    Привет! Меня зовут Александр, я занимаюсь веб-разработкой с уклоном во фронтенд.
                </p>
                <p class="about__text mb-3">
                    Этот блог создан для того, чтобы сохранить свои наработки и другую полезную информацию в одном
                    месте(и, возможно, потренироваться в переводе статей с английского). На данный момент моя работа
                    связана со Vue-стеком, поэтому большинство статей будет "около" Vue.
                </p>
                <p class="about__text">
                    Если у вас есть какие-либо вопросы или предложения, пишите на почту или в телеграм - постараюсь
                    ответить!
                </p>
            </div>
        </div>
    </div>
@endsection
