@extends('layouts.app')
@section('content')
    <section class="portfolio">
        <div class="container">
            <div class="site-card-top__prev">
                <a href="#">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.10742 9.41518L11.2773 14.585C11.5091 14.8169 11.8851 14.8169 12.117 14.585C12.3488 14.3531 12.3488 13.9772 12.117 13.7453L7.7868 9.41518L12.117 5.08502C12.3488 4.85315 12.3488 4.47721 12.117 4.24533C11.8851 4.01346 11.5091 4.01346 11.2773 4.24533L6.10742 9.41518Z" fill="inherit"/>
                    </svg>
                    Портфолио /
                </a>
            </div>
            <h1>Свадьбы на наших площадках</h1>
            <div class="portfolio-tag-wrap">
                <div class="portfolio-tag">
                    <a href="{{route('portfolio.index')}}" class="active">все</a>
                    @foreach($category as $cat)
                        <a href="{{route('portfolio.index',['category'=>$cat->id])}}">{{$cat->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="portfolio-grid">
                @foreach($portfolio as $port)
                        <div class="portfolio-grid-card">
                            <a href="{{route('portfolio.show',['categorySlug'=>$port->slug])}}">
                                @if($file = $port->attachment->first())
                                    <img src="{{ $file->url() }}" alt="{{ $port->title }}">
                                @else
                                    <div class="no-photo">Нет изображения</div>
                                @endif
                                <div class="portfolio-grid-info">{{$port->place->category->name}}</div>
                                <div class="portfolio-grid-text">{{$port->place->name}}</div>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
