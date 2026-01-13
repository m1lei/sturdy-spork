<div>
    <section class="i-filter sites-filter">

        <div class="container">
            <div class="filter">
                <div class="filter-title">Поиск по Подмосковью</div>
                <div class="">

                        <div class="filter-list">
                            @if(isset($city) && count($city))
                                <select class="select" wire:model.live="city_slug">
                                    <option  value="">Город</option>
                                    @foreach($city as $c)
                                        <option value="{{$c->slug}}"> {{$c->name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(isset($category) && count($category))
                                <select class="select" wire:model.live="category_slug">
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
                            <div class="search-relatives-refine">
                                <a href="{{route('place.index')}}">
                                    X
                                </a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
    <section class="sites-two">
        <div class="container">
            <div class="sites-two-sub">Нашлось результатов {{$places->total()}}</div>
            <div class="sites-two-list">
                @foreach($places as $place)
                    <a wire:key="place-{{$place->id}}" href="{{route('place.show',[$place->category->slug,$place->slug])}}" class="i-three-slid">
                        <div class="i-three-slid__img">
                            <span>{{$place->category->name}}</span>
                            @foreach($place->attachment as $file)
                                <img src="{{ $file->url() }}" alt="{{ $file->alt }}">
                            @endforeach
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
                @endforeach
            </div>
            @if($places->hasMorePages())
                <div class="sites-two-btn">
                    <a class="border-btn" href="#" wire:click.prevent="loadMore">
                        Показать больше
                    </a>
                </div>
            @endif
        </div>
    </section>
</div>
