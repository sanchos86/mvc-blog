<aside class="aside col-12 col-sm-12 col-md-12 col-lg-4">
    @include('frontend.components.heading', ['level' => 4, 'headingTitle' => 'Последние записи', 'class' => 'mb-4', 'bordered' => true])
    @include('frontend.components.latest-posts')
    @include('frontend.components.heading', ['level' => 4, 'headingTitle' => 'Тэги', 'class' => 'mb-4', 'bordered' => true])
    @include('frontend.components.tags')
</aside>
