@extends('layouts.app')
@section('content')
    <section class="article">
        <div class="container">
            <div class="site-card-top">
                <div class="site-card-top__left">
                    <span>Поделиться</span>
                    <div class="site-card-top__soc">
                        <a href="{{route('article.index')}}">
                            <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.80382 12C3.65391 12 0.146159 7.4955 0 0H3.08058C3.18176 5.5015 5.45279 7.83183 7.25166 8.31231V0H10.1525V4.74474C11.9289 4.54054 13.795 2.37838 14.4246 0H17.3253C16.8419 2.93093 14.8181 5.09309 13.379 5.98198C14.8181 6.7027 17.123 8.58859 18 12H14.8069C14.1211 9.71772 12.4123 7.95195 10.1525 7.71171V12H9.80382Z"
                                    fill="inherit" />
                            </svg>
                        </a>
                        <a href="{{route('article.index')}}">
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.0955 6.03809C5.38958 4.06858 8.24822 2.7599 9.68367 2.12499C13.7692 0.323932 14.628 0.0129573 15.1801 0C15.3028 0 15.5727 0.0259147 15.7567 0.181402C15.904 0.310975 15.9408 0.479419 15.9653 0.608992C15.9898 0.738565 16.0144 1.01067 15.9898 1.21798C15.769 3.67986 14.812 9.65316 14.3213 12.4001C14.1127 13.5663 13.7078 13.955 13.3152 13.9938C12.4564 14.0716 11.8062 13.3978 10.9842 12.8277C9.68367 11.9336 8.95981 11.3765 7.69612 10.4954C6.23613 9.48472 7.18083 8.92756 8.01511 8.02055C8.23595 7.78732 12.0025 4.15928 12.0761 3.83535C12.0884 3.79648 12.0884 3.64099 12.0025 3.56325C11.9166 3.4855 11.7939 3.51142 11.6958 3.53733C11.5608 3.56325 9.49963 5.01446 5.48773 7.87802C4.89883 8.30561 4.37127 8.51292 3.89279 8.49997C3.36523 8.48701 2.35919 8.18899 1.59852 7.92984C0.67836 7.61887 -0.0577693 7.45043 0.00357478 6.90622C0.0403812 6.62116 0.408445 6.3361 1.0955 6.03809Z"
                                      fill="inherit" />
                            </svg>
                        </a>
                    </div>
                </div>
                @foreach($articles as $article)
                    <div class="site-card-top__right">
                        <div class="site-card-top__prev">
                            <a href="{{route('article.index')}}">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M6.10742 9.41518L11.2773 14.585C11.5091 14.8169 11.8851 14.8169 12.117 14.585C12.3488 14.3531 12.3488 13.9772 12.117 13.7453L7.7868 9.41518L12.117 5.08502C12.3488 4.85315 12.3488 4.47721 12.117 4.24533C11.8851 4.01346 11.5091 4.01346 11.2773 4.24533L6.10742 9.41518Z"
                                          fill="inherit" />
                                </svg> Площадки / </a>
                        </div>
                        <h1>{{$article->title}}</h1>
                    </div>
            </div>
            <div class="site-card-box">
                <div class="site-card-left">
                </div>
                <div class="site-card-right">
                    <div class="article-content">
                        <img src="{{asset('storage/' . $article->image)}}" alt="">
                        <div class="site-card-description"> {{$article->content}}
                        </div>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
    </section>
@endsection
