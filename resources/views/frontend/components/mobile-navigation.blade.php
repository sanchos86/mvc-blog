<div class="mobile-nav">
    <div class="mobile-nav__top">
        <button type="button" class="mobile-nav__close-btn">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <ul class="mobile-nav__list">
        <li class="mobile-nav__item">
            <a class="mobile-nav__link" href="{{ route('home') }}">
                <span>Главная</span>
            </a>
        </li>
        <li class="mobile-nav__item">
            <span class="mobile-nav__link">
                <span>Категории</span>
                <i class="fas fa-sm fa-chevron-down mobile-nav__link-icon"></i>
            </span>
            <ul class="mobile-nav__list mobile-nav__list--subnav">
                @foreach($categories as $category)
                    <li class="mobile-nav__item">
                        <a
                            class="mobile-nav__link"
                            href="{{ route('posts-by-category', ['category' => $category]) }}"
                        >
                            <span>{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="mobile-nav__item">
            <a class="mobile-nav__link" href="{{ route('about') }}">
                <span>О блоге</span>
            </a>
        </li>
    </ul>
</div>
