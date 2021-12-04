<nav class="nav">
    <ul class="nav__list">
        <li @class(['nav__item', 'nav__item--active' => Illuminate\Support\Facades\Route::currentRouteName() === 'home'])>
            <a class="nav__link" href="{{ route('home') }}">
                <span>Главная</span>
            </a>
        </li>
        <li @class(['nav__item', 'nav__item--active' => Illuminate\Support\Facades\Route::currentRouteName() === 'posts-by-category'])>
            <a class="nav__link">
                <span>Категории</span>
                <i class="nav__link-icon fa-sm fas fa-chevron-down"></i>
            </a>
            <ul class="nav__list nav__list--subnav">
                @foreach($categories as $category)
                    <li @class(['nav__item', 'nav__item--active' => (Illuminate\Support\Facades\Route::currentRouteName() === 'posts-by-category') && (Illuminate\Support\Facades\Route::current()->parameter('category')->slug === $category->slug)])>
                        <a class="nav__link" href="{{ route('posts-by-category', ['category' => $category]) }}">
                            <span>{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li @class(['nav__item', 'nav__item--active' => Illuminate\Support\Facades\Route::currentRouteName() === 'about'])>
            <a class="nav__link" href="{{ route('about') }}">
                <span>О блоге</span>
            </a>
        </li>
    </ul>
    <button type="button" class="nav__mobile-menu-switch">
        <i class="fas fa-lg fa-bars"></i>
    </button>
{{--    <transition name="fade">--}}
{{--        <MobileNavigation--}}
{{--                v-show="isMobileNavigationOpened"--}}
{{--                :categories="categories"--}}
{{--                @toggle-mobile-navigation="toggleMobileNavigation"--}}
{{--        />--}}
{{--    </transition>--}}
</nav>
