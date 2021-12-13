<x-layout>
    <x-slot name="title">
        Restaurants page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        <div class="parent-container">
            <div class="child-container">
                <div class="maypege-title-container">
                    {{-- スペース用 --}}
                </div>
                <div class="maypege-subtitle-container">
                    <h1 class="mypage-subtitle-left">予約状況</h1>
                </div>
                @isset ($reservations)
                    @foreach ($reservations as $reservation)
                        <div class="mypage-reserve-box">
                            {{-- 予約カウント取得か --}}
                            <p class="mypage-reserve-txt">予約1</p>
                            <div class="mypage-reserve-icon-container">
                                <span class="material-icons timer">av_timer</span>
                                <form method="post" action="{{ route('mypage.destroy', ['restaurant_id'=>$reservation->restaurant->id]) }}">
                                    @csrf

                                    <button type="submit" class="cancel">
                                        <i class="material-icons cancel">highlight_off</i>
                                    </button>
                                </form>
                            </div>
                            <div class="mypage-reserve-list-container">
                                <ul class="mypage-reserve-info-list">
                                    <li class="mypage-reserve-info-item">Shop</li>
                                    <li class="mypage-reserve-info-item">Date</li>
                                    <li class="mypage-reserve-info-item">Time</li>
                                    <li class="mypage-reserve-info-item">Number</li>
                                </ul>
                                {{-- 予約情報を取得 --}}
                                <ul class="mypage-reserve-info-list">
                                    <li class="mypage-reserve-info-item">{{ $reservation->restaurant->name }}</li>
                                    <li class="mypage-reserve-info-item">{{ $reservation->date }}</li>
                                    <li class="mypage-reserve-info-item">{{ $reservation->time }}</li>
                                    <li class="mypage-reserve-info-item">{{ $reservation->number }}人</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else
                @endisset
            </div>
            <div class="child-container">
                <div class="maypege-title-container">
                    <h1 class="mypage-title">{{ $auth->name }}さん</h1>
                </div>
                <div class="maypege-subtitle-container">
                    <h1 class="mypage-subtitle-right">お気に入り店舗</h1>
                </div>
                <div class="favorite-wrap">
                    @foreach ($favorites as $favorite)
                    <div class="favorite-card favorite-card-radius">
                        <form method="get" action="">
                        @csrf

                            <div class="favorite-favorite-card-header">
                                <figure class="favorite-card-thumbnail">
                                <img src="{{ $favorite->restaurant->image_url }}">
                                </figure>
                            </div>
                            <div class="favorite-card-body">
                                <p class="favorite-card-title">{{ $favorite->restaurant->name }}</p>
                                <div class="favorite-card-tag-wrapper">
                                    <p class="favorite-card-tag-text">#{{ $favorite->restaurant->area->name  }}</p>
                                    <p class="favorite-card-tag-text">#{{ $favorite->restaurant->category->name  }}</p>
                                </div>
                                <div class="favorite-card-footer">
                                    <a href="{{ route('restaurants.datail', [$favorite->restaurant->id]) }}" class="favorite-card-detail-btn">詳しく見る</a>
                                    @inject('favoriteModel', 'App\Models\Favorite')

                                    @if ($favoriteModel->isFavoritedBy(Auth::user(), $favorite->restaurant->id))
                                        <span class="favorite-toggle" user_id={{ auth()->user()->id }} restaurant_id={{ $favorite->restaurant->id }} favorite_count=1>
                                            <i class="material-icons favorited">favorite</i>
                                        </span>
                                    @else
                                        <span class="favorite-toggle" user_id={{ auth()->user()->id }} restaurant_id={{ $favorite->restaurant->id }} favorite_count=0>
                                            <i class="material-icons favorite">favorite</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-layout>
