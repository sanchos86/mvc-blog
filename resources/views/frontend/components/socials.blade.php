<?php
$socials = [
    [
        'name' => 'Github',
        'url' => 'https://github.com/sanchos86',
        'icon' => 'github'
    ],
    [
        'name' => 'Linkedin',
        'url' => 'https://www.linkedin.com/in/aleksandr-aladin/',
        'icon' => 'linkedin'
    ],
    [
        'name' => 'Telegram',
        'url' => 'https://t.me/aleksandr_aladin',
        'icon' => 'telegram'
    ]
];
?>

<ul class="socials">
    @foreach($socials as $social)
        <li class="socials__item">
            <a
                class="socials__link socials__link--{{ $social['icon'] }}"
                target="_blank"
                href="{{ $social['url'] }}"
                title="{{ $social['name'] }}"
            >
                <i class="fab fa-lg fa-{{ $social['icon'] }}"></i>
            </a>
        </li>
    @endforeach
</ul>
