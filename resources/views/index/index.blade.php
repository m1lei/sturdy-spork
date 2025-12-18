@extends('layouts.app')
@section('content')
    <section class="first">
        <div class="portfolio-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="first-slide">
                        <div class="first-slide-img">
                            <img src="{{asset('img/first-slide-img1.png')}}" alt="">
                        </div>
                        <div class="first-slide-box">
                            <div class="first-title">Свадьба в Подмосковье</div>
                            <div class="first-btn">
                                <a href="#">В каталог</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="first-slide">
                        <div class="first-slide-img">
                            <img src="{{asset('img/first-slide-img2.png')}}" alt="">
                        </div>
                        <div class="first-slide-box">
                            <div class="first-title">Свадьба в Подмосковье</div>
                            <div class="first-btn">
                                <a href="#">В каталог</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="first-slide">
                        <div class="first-slide-img">
                            <img src="{{asset('img/first-slide-img1.png')}}" alt="">
                        </div>
                        <div class="first-slide-box">
                            <div class="first-title">Свадьба в Подмосковье</div>
                            <div class="first-btn">
                                <a href="#">В каталог</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="first-slide">
                        <div class="first-slide-img">
                            <img src="{{asset('img/first-slide-img1.png')}}" alt="">
                        </div>
                        <div class="first-slide-box">
                            <div class="first-title">Свадьба в Подмосковье</div>
                            <div class="first-btn">
                                <a href="#">В каталог</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="first-bottom">
            <a href="#">парк</a>
            <a href="#">усадьба / музей / отель</a>
            <a href="#">дворец бракосочетания</a>
            <a href="#">ваша локация</a>
        </div>
    </section>
    <section class="i-two">
        <div class="container">
            <div class="i-two-content">
                <div class="i-two-title">
                    Wedding.<b>mosreg</b> – идеальный выбор места для вашей свадьбы.
                </div>
                <div class="i-two-text">
                    Проведение свадебного торжества в нашем пространстве - это воплощение мечты о незабываемом и роскошном
                </div>
            </div>
        </div>
    </section>
    <section class="i-filter">
        <div class="container">
            <div class="filter">
                <div class="filter-title">Поиск по Подмосковью</div>
                <div class="search-relatives-top">
                    <form action="{{route('place.index')}}" method="GET">
                        @method("GET")
                        <div class="filter-list">
                            @if(isset($city) && count($city))
                                <select class="select" name="city_slug">
                                    <option  value="">Город</option>
                                    @foreach($city as $c)
                                        <option value="{{$c->slug}}"> {{$c->name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(isset($category) && count($category))
                                <select class="select" name="category_slug">
                                    <option  value="">Локация</option>
                                    @foreach($category as $cat)
                                        <option value="{{$cat->slug}}"> {{$cat->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                            <div class="search-relatives-refine">
                                <button id="refine" class="refine-btn" type="submit">
                                    <span>Найти</span>
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
        </div>
    </section>
    <section class="i-three">
        <div class="container">
            <div class="i-three-sub">Площадки /</div>
            <div class="i-three-top">
                <div class="i-three-title">Популярные места</div>
                <div class="i-three-link">
                    <a href="#">
                        Смотреть каталог
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.875 5.65675C13.104 5.4694 13.4415 5.50315 13.6288 5.73214L17.1207 9.99995L13.6288 14.2678C13.4415 14.4967 13.104 14.5305 12.875 14.3431C12.646 14.1558 12.6122 13.8183 12.7996 13.5893L15.298 10.5357H3.57136C3.27549 10.5357 3.03564 10.2958 3.03564 9.99995C3.03564 9.70408 3.27549 9.46423 3.57136 9.46423H15.298L12.7996 6.41061C12.6122 6.18162 12.646 5.84411 12.875 5.65675Z" fill="#1D1D1E"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="swiper i-three-slider">
                <div class="swiper-wrapper">
                    @foreach($places as $place)
                        <div class="">
                        <a href="{{route('place.show',[$place->category->slug,$place->slug])}}" class="i-three-slid">
                            <div class="i-three-slid__img">
                                <span>{{$place->category->name}}</span>
                                @if(is_array($place->image) && isset($place->image['path']))
                                    <img src="{{ asset('storage/' . $place->image['path']) }}" alt="{{ $place->name }}">
                                @else
                                    <img src="{{asset('img/first-slide-img2.png')}}">
                                @endif
                            </div>
                            <div class="i-three-slid__content">
                                <div class="i-three-slid__title">{{$place->name}}</div>
                                <div class="i-three-geo">
                                        <span>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99955 1.96425C6.35458 1.96425 3.39287 4.94544 3.39287 8.63167C3.39287 10.9763 4.78936 13.3367 6.40087 15.1512C7.19865 16.0494 8.0285 16.7902 8.72061 17.3021C9.06725 17.5586 9.3713 17.7516 9.61298 17.8779C9.73391 17.941 9.83175 17.9835 9.90609 18.0092C9.96054 18.028 9.99019 18.0335 9.99955 18.0351C10.0089 18.0335 10.0386 18.028 10.093 18.0092C10.1674 17.9835 10.2652 17.941 10.3862 17.8779C10.6279 17.7516 10.932 17.5585 11.2787 17.3021C11.9709 16.7902 12.8008 16.0494 13.5987 15.1511C15.2105 13.3367 16.6072 10.9763 16.6072 8.63167C16.6072 4.94553 13.6446 1.96425 9.99955 1.96425ZM2.32144 8.63167C2.32144 4.36237 5.75421 0.892822 9.99955 0.892822C14.2448 0.892822 17.6786 4.36228 17.6786 8.63167C17.6786 11.3681 16.0743 13.9775 14.3998 15.8627C13.5545 16.8143 12.67 17.6057 11.9158 18.1635C11.5393 18.442 11.1872 18.6682 10.8822 18.8275C10.6032 18.9733 10.2834 19.1071 9.99955 19.1071C9.71569 19.1071 9.39586 18.9733 9.1169 18.8275C8.81193 18.6682 8.45989 18.442 8.08343 18.1635C7.32933 17.6057 6.44492 16.8142 5.59978 15.8627C3.92545 13.9775 2.32144 11.3681 2.32144 8.63167ZM7.08335 8.57188C7.08335 6.96051 8.38913 5.65473 10.0005 5.65473C11.611 5.65473 12.9167 6.96066 12.9167 8.57188C12.9167 10.1823 11.6109 11.4881 10.0005 11.4881C8.38928 11.4881 7.08335 10.1824 7.08335 8.57188ZM10.0005 6.72616C8.98087 6.72616 8.15477 7.55225 8.15477 8.57188C8.15477 9.5904 8.98073 10.4166 10.0005 10.4166C11.0192 10.4166 11.8453 9.59054 11.8453 8.57188C11.8453 7.55211 11.019 6.72616 10.0005 6.72616Z" fill="#1D1D1E"/>
                                                </svg>
                                                {{$place->city->name}}
                                        </span>
                                </div>
                                <div class="i-three-slid__price">{{$place->price_from}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="i-mob-link">
                <a href="#">Смотреть каталог</a>
            </div>
        </div>
    </section>
    <section class="i-four">
        <div class="container">
            <div class="swiper i-four-slider">
                <div class="">
                    @foreach($categoryFilter as $catFil)
                        <div class="">
                            <a href="#" class="i-four-slid">
                                <div class="i-four-slid__img">
{{--
                                    <img src="img/1.png" alt="">
--}}
                                </div>
                                <div class="i-four-slid__content">
                                    <div class="i-four-slid__title">{{$catFil->name}}</div>
                                    <div class="i-four-slid__text">{{$catFil->placy_count}}/</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="i-five">
        <div class="container">
            <div class="i-five-top">
                <div class="i-five-title">
                    Wedding.<b>mosreg</b> – идеальный выбор места для вашей свадьбы.
                </div>
                <div class="i-five-text">Проведение свадебного торжества в нашем пространстве - это воплощение мечты о незабываемом и роскошном </div>
            </div>
            <div class="i-five-box">
                <div class="i-five-video aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2500" data-aos-delay="850">
                    <a href="{{asset('video/i-five.mp4')}}" width="" height="720" class="comfort__tab" data-fancybox="gallery">
                        <div class="wpb_video_wrapper video_1">
                            <video width="" height="" preload="auto" loop="" muted="" playsinline="">
                                <source src="{{asset('video/i-five.mp4')}}" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                            </video></div>
                    </a>
                    <a href="{{asset('video/i-five.mp4')}}" data-fancybox="gallery" class="video-play-box">
                        <div class="i-five-icon">
                            <svg width="130" height="130" viewBox="0 0 130 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="65" cy="65" r="65" fill="white" fill-opacity="0.36"/>
                                <path d="M57.4335 53.5432C57.4333 52.7734 58.2666 52.2921 58.9333 52.6768L78.9961 64.2537C79.6629 64.6384 79.6631 65.6007 78.9965 65.9858L58.9392 77.5722C58.2727 77.9572 57.4392 77.4763 57.439 76.7065L57.4335 53.5432Z" fill="white"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="i-six">
        <div class="container">
            <div class="i-six-sub">Портфолио /</div>
            <div class="i-six-top">
                <div class="i-six-title">Проведенные свадьбы</div>
                <div class="i-three-link">
                    <a href="#">
                        Смотреть все фото
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.875 5.65675C13.104 5.4694 13.4415 5.50315 13.6288 5.73214L17.1207 9.99995L13.6288 14.2678C13.4415 14.4967 13.104 14.5305 12.875 14.3431C12.646 14.1558 12.6122 13.8183 12.7996 13.5893L15.298 10.5357H3.57136C3.27549 10.5357 3.03564 10.2958 3.03564 9.99995C3.03564 9.70408 3.27549 9.46423 3.57136 9.46423H15.298L12.7996 6.41061C12.6122 6.18162 12.646 5.84411 12.875 5.65675Z" fill="#1D1D1E"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="swiper i-six-slider">
                <div class="">
                    @foreach($portfolios as $port)
                        @foreach($port->images as $imagePath)
                            <div class="">
                                <a href="#" class="i-six-slid">
                                    <div class="i-six-slid__img">
                                        <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $port->title }}">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <div class="i-mob-link">
                <a href="#">Все фото</a>
            </div>
        </div>
    </section>
    <section class="i-seven">
        <div class="container">
            <div class="i-six-sub">Статьи /</div>
            <div class="i-six-top">
                <div class="i-six-title">Будь в тренде вместе с нами</div>
                <div class="i-three-link">
                    <a href="#">
                        Все статьи
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.875 5.65675C13.104 5.4694 13.4415 5.50315 13.6288 5.73214L17.1207 9.99995L13.6288 14.2678C13.4415 14.4967 13.104 14.5305 12.875 14.3431C12.646 14.1558 12.6122 13.8183 12.7996 13.5893L15.298 10.5357H3.57136C3.27549 10.5357 3.03564 10.2958 3.03564 9.99995C3.03564 9.70408 3.27549 9.46423 3.57136 9.46423H15.298L12.7996 6.41061C12.6122 6.18162 12.646 5.84411 12.875 5.65675Z" fill="#1D1D1E"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="swiper i-seven-slider">
                <div class="swiper-wrapper">
                    @foreach($articles as $article)
                        <div class="">
                            <a href="#" class="i-seven-slid">
                                <div class="i-seven-slid__img">
                                    <img src="{{asset('storage/'. $article->image)}}" alt="asd">
                                </div>
                                <div class="i-seven-slid__content">
                                    <div class="i-seven-slid__title">{{$article->title}}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
            </div>
        </div>
        </div>
    </section>
    <section class="i-eight">
        <div class="container">
            <div class="i-eight-flex">
                <div class="i-eight-left">
                    <div class="i-eight-sub">Вопросы /</div>
                    <div class="i-eight-title">Вы спрашиваете – мы отвечаем</div>
                </div>
                <div class="i-eight-right">
                    <div class="accordion">
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">По каким параметрам выбрать лучшую площадку для свадьбы?</span><span class="icon" aria-hidden="true"></span></button>
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
                            <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Что сейчас в тренде?</span><span class="icon" aria-hidden="true"></span></button>
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
                            <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Можно ли заказать фотографа?</span><span class="icon" aria-hidden="true"></span></button>
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
                            <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">По каким параметрам выбрать лучшую площадку для свадьбы?</span><span class="icon" aria-hidden="true"></span></button>
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
    </section>
    <section class="i-baner">
        <div class="container">
            <div class="i-baner-box">
                <div class="i-baner-left">
                    <div class="i-baner-title">Вам нужна выездная регистрация?</div>
                    <div class="i-baner-btn">
                        <a href="#">Подать заявление</a>
                    </div>
                </div>
                <div class="i-baner-img">
                    <img src="{{asset('img/i-baner-img.png')}}" alt="ФОТО">
                </div>
            </div>
        </div>
    </section>

@endsection
