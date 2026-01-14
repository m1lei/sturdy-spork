<div>
    <section class="portfolio">
        <div class="container">
            <div class="site-card-top__prev">
                <a href="#">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.10742 9.41518L11.2773 14.585C11.5091 14.8169 11.8851 14.8169 12.117 14.585C12.3488 14.3531 12.3488 13.9772 12.117 13.7453L7.7868 9.41518L12.117 5.08502C12.3488 4.85315 12.3488 4.47721 12.117 4.24533C11.8851 4.01346 11.5091 4.01346 11.2773 4.24533L6.10742 9.41518Z" fill="inherit"/>
                    </svg>
                    Статьи /
                </a>
            </div>
            <h1>Статьи</h1>
            <div class="articles-grid">
                @foreach($articles as $article)
                    <div class="articles-card">
                        <a href="{{route('article.show',['articleSlug' => $article->slug])}}">
                            @foreach($article->attachment as $file)
                                <div class="articles-card-img">
                                    <img src="{{ $file->url() }}" alt="{{ $file->alt }}">
                                </div>
                            @endforeach
                            <div class="articles-card-content">
                                <div class="articles-card-title">{{$article->title}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @if($articles->hasMorePages())
                <div class="articles-btn">
                    <a href="#" class="border-btn" wire:click.prevent="loadMore".>Показать больше</a>
                </div>
            @endif

        </div>
    </section>
</div>
