<header class="header">
    <div class="header__top pb-4 pt-sm-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="header__title justify-content-center justify-content-sm-start mb-2 mb-sm-0">
                        <a href="{{ route('home') }}" class="header__logo">
                            web-artisan.ru
                        </a>
                    </h1>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="header__socials justify-content-center justify-content-sm-end">
                        @include('frontend.components.socials')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('frontend.components.navigation')
                </div>
            </div>
        </div>
    </div>
</header>
