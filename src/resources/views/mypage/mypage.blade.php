<x-mypage>
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
                <div class="reserve-box">
                    <p class="reserve-txt">予約1</p>
                    <div class="reserve-icon-container">
                        <span class="material-icons timer">av_timer</span>
                        {{-- カウント必要か --}}
                        <span class="material-icons cancel">highlight_off</span>
                    </div>
                    <div class="reserve-list-container">
                        <ul class="reserve-info-list">
                            <li class="reserve-info-item">Shop</li>
                            <li class="reserve-info-item">Date</li>
                            <li class="reserve-info-item">Time</li>
                            <li class="reserve-info-item">Number</li>
                        </ul>
                        {{-- 予約情報を取得 --}}
                        <ul class="reserve-info-list">
                            <li class="reserve-info-item">仙人</li>
                            <li class="reserve-info-item">2021-04-01</li>
                            <li class="reserve-info-item">17:00</li>
                            <li class="reserve-info-item">1人</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="child-container">
                <div class="maypege-title-container">
                    {{-- ToDo: ユーザ名を取得 --}}
                    <h1 class="mypage-title">hogeさん</h1>
                </div>
                <div class="maypege-subtitle-container">
                    <h1 class="mypage-subtitle-right">お気に入り店舗</h1>
                </div>
                <div class="wrap">
                    {{-- @foreach ($restaurants as $restaurant) --}}
                    <div class="card card-radius">
                        <form method="get" action="">
                        @csrf

                            <div class="card-header">
                                <figure class="card-thumbnail">
                                    {{-- 仮イメージ --}}
                                <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg">
                                </figure>
                            </div>
                            <div class="card-body">
                                <p class="card-title">仙人</p>
                                <div class="card-tag-wrapper">
                                    <p class="card-tag-text">#東京都</p>
                                    <p class="card-tag-text">#寿司</p>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="card-detail-btn" value="詳しく見る">
                                    {{-- @auth --}}
                                        {{-- @inject('favorite', 'App\Models\Favorite') --}}
                                        {{-- @if ($favorite->isFavoritedBy(Auth::user(), $restaurant->id))
                                            <span class="favorite-toggle" user_id={{ auth()->user()->id }} restaurant_id={{ $restaurant->id }} favorite_count=1>
                                                <i class="material-icons favorited">favorite</i>
                                            </span>
                                        @else --}}
                                        {{-- <span class="favorite-toggle" user_id={{ auth()->user()->id }} restaurant_id={{ $restaurant->id }} favorite_count=0> --}}
                                            <i class="material-icons favorited">favorite</i>
                                        {{-- </span> --}}
                                        {{-- @endif --}}
                                    {{-- @endauth --}}
                                    {{-- @guest
                                        <i class="material-icons favorite-icon">favorite</i>
                                    @endguest --}}
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </main>
</x-mypage>
