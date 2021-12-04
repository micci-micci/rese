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
                @foreach ($reservations as $reservation)
                <div class="reserve-box">
                    {{-- 予約カウント取得か --}}
                    <p class="reserve-txt">予約1</p>
                    <div class="reserve-icon-container">
                        <span class="material-icons timer">av_timer</span>
                        {{-- <form method="post" action="{{ route('restaurants.destroy', ['restaurant_id'=>$reservation->restaurant->id]) }}"> --}}
                        <form method="post" action="{{ route('restaurants.destroy', ['restaurant_id'=>$reservation->restaurant->id]) }}">
                            @csrf

                            <input type="submit" name="" id="destroy">
                            {{-- <input type="submit" name="test" id="destroy" style="display:none;"> --}}
                            <label for="destroy" class="material-icons cancel">highlight_off</label>
                        </form>
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
                            <li class="reserve-info-item">{{ $reservation->restaurant->name }}</li>
                            <li class="reserve-info-item">{{ $reservation->date }}</li>
                            <li class="reserve-info-item">{{ $reservation->time }}</li>
                            <li class="reserve-info-item">{{ $reservation->number }}人</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="child-container">
                <div class="maypege-title-container">
                    <h1 class="mypage-title">{{ $reservation->user->name }}さん</h1>
                </div>
                <div class="maypege-subtitle-container">
                    <h1 class="mypage-subtitle-right">お気に入り店舗</h1>
                </div>
                <div class="wrap">
                    @foreach ($favorites as $favorite)
                    <div class="card card-radius">
                        <form method="get" action="">
                        @csrf

                            <div class="card-header">
                                <figure class="card-thumbnail">
                                <img src="{{ $favorite->restaurant->image_url }}">
                                </figure>
                            </div>
                            <div class="card-body">
                                <p class="card-title">{{ $favorite->restaurant->name }}</p>
                                <div class="card-tag-wrapper">
                                    <p class="card-tag-text">#{{ $favorite->restaurant->area->name  }}</p>
                                    <p class="card-tag-text">#{{ $favorite->restaurant->category->name  }}</p>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="card-detail-btn" value="詳しく見る">
                                    <i class="material-icons favorited">favorite</i>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-mypage>
