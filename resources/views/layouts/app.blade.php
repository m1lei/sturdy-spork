<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cdn.jsdelivr.net" />
    @vite(['resources/css/app.css'])
</head>
<body>
<header class="header bg-w transparent">
    <div class="header-top">
        <div class="header-top__row">
            <div class="header-menu-left">
                <a href="#" class="header-logo">
                    wedding.<b>mosreg</b>
                </a>
                <ul class="header-menu-list">
                    <li><a href="{{route('place.index')}}">Площадки /</a></li>
                    <li><a href="#">Портфолио /</a></li>
                    <li><a href="#">Отзывы /</a></li>
                    <li><a href="#">Статьи /</a></li>
                    <li><a href="#">Общая информация /</a></li>
                </ul>
            </div>
            <div class="header-menu-right">
                <div class="header-menu-social">
                    <a href="#">
                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.80382 12C3.65391 12 0.146159 7.4955 0 0H3.08058C3.18176 5.5015 5.45279 7.83183 7.25166 8.31231V0H10.1525V4.74474C11.9289 4.54054 13.795 2.37838 14.4246 0H17.3253C16.8419 2.93093 14.8181 5.09309 13.379 5.98198C14.8181 6.7027 17.123 8.58859 18 12H14.8069C14.1211 9.71772 12.4123 7.95195 10.1525 7.71171V12H9.80382Z" fill="inherit"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.0955 6.03809C5.38958 4.06858 8.24822 2.7599 9.68367 2.12499C13.7692 0.323932 14.628 0.0129573 15.1801 0C15.3028 0 15.5727 0.0259147 15.7567 0.181402C15.904 0.310975 15.9408 0.479419 15.9653 0.608992C15.9898 0.738565 16.0144 1.01067 15.9898 1.21798C15.769 3.67986 14.812 9.65316 14.3213 12.4001C14.1127 13.5663 13.7078 13.955 13.3152 13.9938C12.4564 14.0716 11.8062 13.3978 10.9842 12.8277C9.68367 11.9336 8.95981 11.3765 7.69612 10.4954C6.23613 9.48472 7.18083 8.92756 8.01511 8.02055C8.23595 7.78732 12.0025 4.15928 12.0761 3.83535C12.0884 3.79648 12.0884 3.64099 12.0025 3.56325C11.9166 3.4855 11.7939 3.51142 11.6958 3.53733C11.5608 3.56325 9.49963 5.01446 5.48773 7.87802C4.89883 8.30561 4.37127 8.51292 3.89279 8.49997C3.36523 8.48701 2.35919 8.18899 1.59852 7.92984C0.67836 7.61887 -0.0577693 7.45043 0.00357478 6.90622C0.0403812 6.62116 0.408445 6.3361 1.0955 6.03809Z" fill="inherit"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_2001_1853" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                <path d="M0 10C0 4.47715 4.47715 0 10 0C15.5229 0 20 4.47715 20 10C20 15.5229 15.5229 20 10 20C4.47715 20 0 15.5229 0 10Z" fill="inherit"/>
                            </mask>
                            <g mask="url(#mask0_2001_1853)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70033 0C9.64997 4.05387 9.37325 6.33233 7.8528 7.85278C6.33233 9.37323 4.05387 9.64997 0 9.70032V10.2997C4.05387 10.35 6.33235 10.6267 7.8528 12.1472C9.37325 13.6677 9.64997 15.9461 9.70033 20H10.2997C10.35 15.9461 10.6268 13.6677 12.1472 12.1472C13.6677 10.6268 15.9461 10.35 20 10.2997V9.70032C15.9461 9.64995 13.6677 9.37323 12.1472 7.85278C10.6268 6.33233 10.35 4.05385 10.2997 0H9.70033Z" fill="inherit"/>
                            </g>
                        </svg>
                    </a>
                </div>
                <a class="header-menu-link" href="#hidden" data-fancybox><span>Подать заявление</span></a>
            </div>
            <div class="burger-menu">
                <div class="header-logo-burger">
                    <a href="#" class="header-logo-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <div class="hidden-menu">
                    <div class="header__menu">
                        <div class="hidden-logo">
                            wedding.<b>mosreg</b>
                        </div>
                        <ul class="hidden-menu-list">

                            <li><a href="#">Площадки /</a></li>
                            <li><a href="#">Портфолио /</a></li>
                            <li><a href="#">Отзывы /</a></li>
                            <li><a href="#">Статьи /</a></li>
                            <li><a href="#">Общая информация /</a></li>
                        </ul>
                        <div class="hidden-menu-bottom">
                            <div class="hidden-menu-social">
                                <a href="#">
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.80382 12C3.65391 12 0.146159 7.4955 0 0H3.08058C3.18176 5.5015 5.45279 7.83183 7.25166 8.31231V0H10.1525V4.74474C11.9289 4.54054 13.795 2.37838 14.4246 0H17.3253C16.8419 2.93093 14.8181 5.09309 13.379 5.98198C14.8181 6.7027 17.123 8.58859 18 12H14.8069C14.1211 9.71772 12.4123 7.95195 10.1525 7.71171V12H9.80382Z" fill="white"/>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.0955 6.03809C5.38958 4.06858 8.24822 2.7599 9.68367 2.12499C13.7692 0.323932 14.628 0.0129573 15.1801 0C15.3028 0 15.5727 0.0259147 15.7567 0.181402C15.904 0.310975 15.9408 0.479419 15.9653 0.608992C15.9898 0.738565 16.0144 1.01067 15.9898 1.21798C15.769 3.67986 14.812 9.65316 14.3213 12.4001C14.1127 13.5663 13.7078 13.955 13.3152 13.9938C12.4564 14.0716 11.8062 13.3978 10.9842 12.8277C9.68367 11.9336 8.95981 11.3765 7.69612 10.4954C6.23613 9.48472 7.18083 8.92756 8.01511 8.02055C8.23595 7.78732 12.0025 4.15928 12.0761 3.83535C12.0884 3.79648 12.0884 3.64099 12.0025 3.56325C11.9166 3.4855 11.7939 3.51142 11.6958 3.53733C11.5608 3.56325 9.49963 5.01446 5.48773 7.87802C4.89883 8.30561 4.37127 8.51292 3.89279 8.49997C3.36523 8.48701 2.35919 8.18899 1.59852 7.92984C0.67836 7.61887 -0.0577693 7.45043 0.00357478 6.90622C0.0403812 6.62116 0.408445 6.3361 1.0955 6.03809Z" fill="white"/>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_2001_1853" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                            <path d="M0 10C0 4.47715 4.47715 0 10 0C15.5229 0 20 4.47715 20 10C20 15.5229 15.5229 20 10 20C4.47715 20 0 15.5229 0 10Z" fill="white"/>
                                        </mask>
                                        <g mask="url(#mask0_2001_1853)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70033 0C9.64997 4.05387 9.37325 6.33233 7.8528 7.85278C6.33233 9.37323 4.05387 9.64997 0 9.70032V10.2997C4.05387 10.35 6.33235 10.6267 7.8528 12.1472C9.37325 13.6677 9.64997 15.9461 9.70033 20H10.2997C10.35 15.9461 10.6268 13.6677 12.1472 12.1472C13.6677 10.6268 15.9461 10.35 20 10.2997V9.70032C15.9461 9.64995 13.6677 9.37323 12.1472 7.85278C10.6268 6.33233 10.35 4.05385 10.2997 0H9.70033Z" fill="white"/>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <a class="header-menu-link" href="#hidden" data-fancybox><span>Подать заявление</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer class="footer">
    <div class="container">
        <div class="footer-flex">
            <div class="footer-left">
                <a href="#" class="footer-logo">
                    wedding.<b>mosreg</b>
                </a>
                <div class="footer-copyright">
                    <a href="#">Политика конфиденциальности</a>
                    <span>© 2024, wedding.mosreg.ru</span>
                </div>
            </div>
            <div class="footer-right">
                <ul>
                    <li><a href="#">Площадки /</a></li>
                    <li><a href="#">Парки /</a></li>
                    <li><a href="#">Портфолио /</a></li>
                    <li><a href="#">Усадьбы / Музеи / Отели /</a></li>
                    <li><a href="#">Отзывы /</a></li>
                    <li><a href="#">Дворец бракосочетания /</a></li>
                    <li><a href="#">Статьи /</a></li>
                    <li><a href="#">Своя длокация /</a></li>
                    <li><a href="#">Общая информация /</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="cdn.jsdelivr.net"></script>
{{-- 3. Стек для ваших скриптов инициализации --}}
@vite(['resources/js/app.js'])
@stack('scripts')
</body>
</html>

