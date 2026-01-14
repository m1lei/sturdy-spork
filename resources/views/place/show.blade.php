@extends('layouts.app')
@section('content')
    <section class="site-card">
        <div class="container">
            <div class="site-card-top">
                <div class="site-card-top__right">
                    <div class="site-card-top__prev">
                        <a href="#">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.10742 9.41518L11.2773 14.585C11.5091 14.8169 11.8851 14.8169 12.117 14.585C12.3488 14.3531 12.3488 13.9772 12.117 13.7453L7.7868 9.41518L12.117 5.08502C12.3488 4.85315 12.3488 4.47721 12.117 4.24533C11.8851 4.01346 11.5091 4.01346 11.2773 4.24533L6.10742 9.41518Z" fill="inherit"/>
                            </svg>
                            Площадки /
                        </a>
                    </div>
                    <h1>{{$place->name}}</h1>
                    <div class="site-card-top__flex">
                        <div class="site-card-top__list">
                            <div class="site-card-top__info">
                                <span>{{$place->category->name}}</span>
                            </div>
                            <div class="site-card-geo">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99955 1.96425C6.35458 1.96425 3.39287 4.94544 3.39287 8.63167C3.39287 10.9763 4.78936 13.3367 6.40087 15.1512C7.19865 16.0494 8.0285 16.7902 8.72061 17.3021C9.06725 17.5586 9.3713 17.7516 9.61298 17.8779C9.73391 17.941 9.83175 17.9835 9.90609 18.0092C9.96054 18.028 9.99019 18.0335 9.99955 18.0351C10.0089 18.0335 10.0386 18.028 10.093 18.0092C10.1674 17.9835 10.2652 17.941 10.3862 17.8779C10.6279 17.7516 10.932 17.5585 11.2787 17.3021C11.9709 16.7902 12.8008 16.0494 13.5987 15.1511C15.2105 13.3367 16.6072 10.9763 16.6072 8.63167C16.6072 4.94553 13.6446 1.96425 9.99955 1.96425ZM2.32144 8.63167C2.32144 4.36237 5.75421 0.892822 9.99955 0.892822C14.2448 0.892822 17.6786 4.36228 17.6786 8.63167C17.6786 11.3681 16.0743 13.9775 14.3998 15.8627C13.5545 16.8143 12.67 17.6057 11.9158 18.1635C11.5393 18.442 11.1872 18.6682 10.8822 18.8275C10.6032 18.9733 10.2834 19.1071 9.99955 19.1071C9.71569 19.1071 9.39586 18.9733 9.1169 18.8275C8.81193 18.6682 8.45989 18.442 8.08343 18.1635C7.32933 17.6057 6.44492 16.8142 5.59978 15.8627C3.92545 13.9775 2.32144 11.3681 2.32144 8.63167ZM7.08335 8.57188C7.08335 6.96051 8.38913 5.65473 10.0005 5.65473C11.611 5.65473 12.9167 6.96066 12.9167 8.57188C12.9167 10.1823 11.6109 11.4881 10.0005 11.4881C8.38928 11.4881 7.08335 10.1824 7.08335 8.57188ZM10.0005 6.72616C8.98087 6.72616 8.15477 7.55225 8.15477 8.57188C8.15477 9.5904 8.98073 10.4166 10.0005 10.4166C11.0192 10.4166 11.8453 9.59054 11.8453 8.57188C11.8453 7.55211 11.019 6.72616 10.0005 6.72616Z" fill="#1D1D1E"></path>
                                        </svg>
                                        {{$place->city->name}}
                                </span>
                            </div>
                        </div>
                        <div class="view-sites-all">
                            <a href="#">
                                Смотреть альбом  площадки
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-card-box">
                <div class="site-card-left">
                    <div class="site-card-sticky">
                        <div class="sites-map-box">
                            <div class="sites-map-btn">
                                <a href="#" data-fancybox="">Поиск по карте</a>
                            </div>
                        </div>
                        <div class="site-card-price">{{$place->price_from}}</div>
                        <div class="site-card-table">
                            <div class="site-card-table__row">
                                <b>Адрес</b>
                                <span>{{$place->address}}</span>
                            </div>
                            <div class="site-card-table__row">
                                <b>Контакты</b>
                                <a href="tel:+79009999999">+7 (900) 999-99-99</a>
                                <a href="malito:mail@gmail.com">mail@gmail.com</a>
                            </div>
                            <div class="site-card-table__btn">
                                <a href="#">Подать заявление</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="site-card-right">
                    <div class="site-card-slider">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach($portfolio as $port)
                                    @foreach($port->attachment as $file)
                                        <div class="swiper-slide">
                                            <img src="{{ $file->url() }}" alt="{{ $file->alt }}">
                                        </div>
                                    @endforeach
                                @endforeach
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="view-sites-mob__all">
                        <a href="#">
                            Смотреть альбом  площадки
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8745 5.65681C13.1035 5.46945 13.441 5.50321 13.6283 5.73219L17.1202 10L13.6283 14.2678C13.441 14.4968 13.1035 14.5305 12.8745 14.3432C12.6455 14.1558 12.6118 13.8183 12.7991 13.5893L15.2975 10.5357H3.57087C3.275 10.5357 3.03516 10.2959 3.03516 10C3.03516 9.70413 3.275 9.46429 3.57087 9.46429H15.2975L12.7991 6.41066C12.6118 6.18167 12.6455 5.84416 12.8745 5.65681Z" fill="inherit"/>
                            </svg>
                        </a>
                    </div>
                    <div class="site-card-content">
                        <div class="site-card-description">
                                {{$place->title}}
                        </div>
                        <div class="content-area">
                            {!! Illuminate\Support\Str::markdown($place->description) !!}
                        </div>
                        <div class="site-card-mob">
                            <div class="site-card-mob__flex">
                                <div class="site-card-price">{{$place->price_from}}</div>
                            </div>

                            <div class="site-card-table">
                                <div class="site-card-table__row">
                                    <b>Адрес</b>
                                    <span>{{$place->address}}</span>
                                </div>
                                <div class="site-card-table__row">
                                    <b>Контакты</b>
                                    <a href="tel:+79009999999">+7 (900) 999-99-99</a>
                                    <a href="malito:mail@gmail.com">mail@gmail.com</a>
                                </div>
                                <div class="site-card-table__btn">
                                    <a href="#">Подать заявление</a>
                                </div>
                            </div>
                        </div>

                        <div class="site-card-mob__accordion">
                            <div class="site-card-accordion">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">Можно ли заказать фотографа?</span><span class="icon" aria-hidden="true">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0251 20.0804C18.3457 20.3427 18.8182 20.2955 19.0805 19.9749L23.969 14L19.0805 8.02505C18.8182 7.70446 18.3457 7.65721 18.0251 7.91951C17.7045 8.1818 17.6572 8.65432 17.9195 8.97491L21.4173 13.25L5 13.25C4.58579 13.25 4.25 13.5858 4.25 14C4.25 14.4142 4.58579 14.75 5 14.75L21.4173 14.75L17.9195 19.025C17.6572 19.3456 17.7045 19.8181 18.0251 20.0804Z" fill="#1D1D1E"/>
                                              </svg>
                                        </span></button>
                                        <div class="accordion-content">
                                            <p>
                                                Размеры места для погрузки и разгрузки перед техническим входом. Если данная зона будет слишком маленькой, это застопорит всю работу, и персонал может выбиться из графика.
                                            </p>
                                            <p>
                                                Наличие парковки и маршруты проезда. Оборудование площадки и мощность электричества. Нужно выяснить, подходит ли уже имеющаяся техника для вашего мероприятия, и хватит ли мощности для подключения дополнительных единиц.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Что нужно взять</span><span class="icon" aria-hidden="true">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0251 20.0804C18.3457 20.3427 18.8182 20.2955 19.0805 19.9749L23.969 14L19.0805 8.02505C18.8182 7.70446 18.3457 7.65721 18.0251 7.91951C17.7045 8.1818 17.6572 8.65432 17.9195 8.97491L21.4173 13.25L5 13.25C4.58579 13.25 4.25 13.5858 4.25 14C4.25 14.4142 4.58579 14.75 5 14.75L21.4173 14.75L17.9195 19.025C17.6572 19.3456 17.7045 19.8181 18.0251 20.0804Z" fill="#1D1D1E"/>
                                              </svg>
                                        </span></button>
                                        <div class="accordion-content">
                                            <p>
                                                Размеры места для погрузки и разгрузки перед техническим входом. Если данная зона будет слишком маленькой, это застопорит всю работу, и персонал может выбиться из графика.
                                            </p>
                                            <p>
                                                Наличие парковки и маршруты проезда. Оборудование площадки и мощность электричества. Нужно выяснить, подходит ли уже имеющаяся техника для вашего мероприятия, и хватит ли мощности для подключения дополнительных единиц.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
