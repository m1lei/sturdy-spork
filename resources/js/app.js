import './bootstrap';
// resources/js/app.js

// Импортируем jQuery и делаем его глобально доступным
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;
import Swiper from 'swiper';
import 'swiper/css';

window.Swiper = Swiper;

jQuery(document).ready(function () {

    // Логика меню и шапки сайта
    if (jQuery('.header-logo-menu').length) {
        jQuery('.header-logo-menu').click(function () {
            $(this).toggleClass('active');
            $('.header-top').toggleClass('fix');
            $('body').toggleClass('fix');
            $('html').toggleClass('fix');
            $('.hidden-menu').toggleClass('open');
            return false;
        });
    }

    const onScrollHeader = () => {
        const header = jQuery('.header')
        let prevScroll = jQuery(window).scrollTop()
        let currentScroll

        jQuery(window).scroll(() => {
            currentScroll = jQuery(window).scrollTop()
            const headerHidden = () => header.hasClass('header_hidden')

            if (currentScroll > prevScroll && currentScroll > 100 && !headerHidden()) {
                header.addClass('header_hidden')
            }
            if (currentScroll < prevScroll && headerHidden()) {
                header.removeClass('header_hidden')
                jQuery('.bg-w').removeClass('transparent');
                header.addClass('active');
            }
            if (jQuery(document).scrollTop() <= 80) {
                jQuery('.bg-w').addClass('transparent');
            }
            prevScroll = currentScroll
        })
    }
    onScrollHeader()

    function resizeScrenn() {
        if ($(window).width() <= 1300) {
            $('.header-n__menu-list-drop-item').on('click', function (e) {
                console.log(e.target != this);
                if (!$(this).is(".open")) {
                    $('.header-n__menu-list-drop-item').removeClass('open');
                }
                $(this).toggleClass('open');
                $('.header-n__logo.header-n__menu-list-drop-item').removeClass('open');
            });
        } else {
            $(document).ready(function () {
                $(".header-n__menu-list-drop-item").click(function () {
                    $('.header-n__menu-list-drop-item').removeClass('open');
                    $(this).addClass('open');
                });
            });
        }
    }
    resizeScrenn();
    $(window).resize(function () {
        resizeScrenn();
    });


    // Слайдер портфолио
    new Swiper('.portfolio-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        on: {
            init: function() {
                $('.js-current-slide').text("0" + (this.realIndex + 1));
                $('.js-all-slide').text("0" + this.slides.length);
            },
            slideChange: function() {
                $('.js-current-slide').text("0" + (this.realIndex + 1));
            },
            //
        }
    });

    function translateVal(el) {
        if (el && el.style && el.style.transform) {
            var progress = el.style.transform.match(/translate3d\((.+)px,(.+)px,(.+)px\)/);
            return progress ? progress[1] : 0;
        }
        return 0;
    }

    new Swiper(".i-three-slider", {
        slidesPerView: 3.2,
        spaceBetween: 20,
        breakpoints: {
            320: { slidesPerView: 1.1, spaceBetween: 20 },
            640: { slidesPerView: 2, spaceBetween: 20 },
            768: { slidesPerView: 2.1, spaceBetween: 20 },
            1024: { slidesPerView: 2.2, spaceBetween: 20 },
            1824: { slidesPerView: 3.2, spaceBetween: 20 },
        },
    });

    // ... (остальные инициализации Swiper для i-four-slider, i-six-slider, mySwiper и т.д.) ...
    if ($(window).width() < 767) { /* ... Swiper для i-four-slider ... */ }
    new Swiper(".i-six-slider", { /* ... */ });
    new Swiper(".i-seven-slider", { /* ... */ });

    var swiper = new Swiper(".mySwiper", { /* ... */ });
    new Swiper(".mySwiper2", { /* ... */ });


    // --- ЛОГИКА КАСТОМНОГО SELECT ---
    $('.select').each(function () {
        const _this = $(this),
            selectOption = _this.find('option'),
            selectOptionLength = selectOption.length,
            duration = 450;

        _this.hide();
        _this.wrap('<div class="select"></div>');
        $('<div>', {
            class: 'new-select',
            text: _this.children('option:disabled').text()
        }).insertAfter(_this);

        const selectHead = _this.next('.new-select');
        $('<div>', {
            class: 'new-select__list'
        }).insertAfter(selectHead);

        const selectList = selectHead.next('.new-select__list');
        for (let i = 1; i < selectOptionLength; i++) {
            // Исправленный синтаксис создания элементов списка
            $('<div>', {
                class: 'new-select__item',
                html: $('<span>', { text: selectOption.eq(i).text() }).prop('outerHTML'),
                rel: selectOption.eq(i).val()
            }).appendTo(selectList);
        }

        // Добавляем логику работы кастомного селекта
        selectList.on('click', '.new-select__item', function() {
            const selectText = $(this).text();
            const selectRel = $(this).attr('rel');
            selectHead.text(selectText);
            _this.val(selectRel);
            selectList.slideUp(duration);
        });

        selectHead.on('click', function() {
            $('.new-select__list').slideUp(duration);
            selectList.slideToggle(duration);
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.select').length) {
                $('.new-select__list').slideUp(duration);
            }
        });
    });
});
