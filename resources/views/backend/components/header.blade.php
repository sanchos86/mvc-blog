<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarToggler">
            <a
                @if (Illuminate\Support\Facades\Route::currentRouteName() !== 'backend-home') href="{{ route('backend-home') }}" @endif
                class="navbar-brand"
            >
                web-artisan.ru
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a
                        @class(['nav-link', 'active' => Illuminate\Support\Facades\Route::currentRouteName() === 'posts-index'])
                        href="{{ route('posts-index') }}"
                    >
                        Записи
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        @class(['nav-link', 'active' => Illuminate\Support\Facades\Route::currentRouteName() === 'categories-index'])
                        href="{{ route('categories-index') }}"
                    >
                        Категории
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        @class(['nav-link', 'active' => Illuminate\Support\Facades\Route::currentRouteName() === 'tags-index'])
                        href="{{ route('tags-index') }}"
                    >
                        Теги
                    </a>
                </li>
            </ul>
        </div>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarToggler"
            aria-controls="navbarToggler"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="dropdown">
            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton2">Меню</button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Настройки</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        <button type="submit" class="dropdown-item">Выйти</button>
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
