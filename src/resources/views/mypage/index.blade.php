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
                        @if ($dt < $reservation->date )
                        <div class="mypage-reserve-box">
                            <p class="mypage-reserve-txt">予約{{ $loop->iteration}}</p>
                            <div class="mypage-reserve-icon-container">
                                <span class="material-icons timer">av_timer</span>
                                <form method="post" action="{{ route('mypage.destroy', ['restaurant_id'=>$reservation->restaurant->id]) }}">
                                    @csrf

                                    <button type="submit" class="cancel">
                                        <i class="material-icons cancel">highlight_off</i>
                                    </button>
                                </form>
                            </div>
                            <div class="mypage-reserve-table-container">
                                <form action="{{ route('mypage.update', ['restaurant_id'=>$reservation->restaurant->id]) }}" method="post">
                                    @csrf

                                    <table class="mypage-info-table">
                                        <tr>
                                            <td>Shop</td>
                                            <td>{{ $reservation->restaurant->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td id="date">
                                                <input type="date" class="icon-del update" name="date" value="{{ $reservation->date }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Time</td>
                                            <td id="time">
                                                <input type="time" class="icon-del update" name="time" value="{{ $reservation->time }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Number</td>
                                            <td id="number">
                                                <input type="number" class="update" name="number" value="{{ $reservation->number }}">
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="submit" class="mypage-reserve-btn" value="変更">
                                </form>
                            </div>
                        </div>
                        {{-- 予約日を超えた場合 --}}
                        @else
                        @inject('review', 'App\Models\Review')
                            @if (!$review->isReviewBy(Auth::user(), $reservation->restaurant->id))
                            <div class="mypage-reserve-done-box">
                                <p class="mypage-done-txt">予約{{ $loop->iteration}}</p>
                                <div class="mypage-reserve-icon-container">
                                    <span class="material-icons timer-done">av_timer</span>
                                    <form method="post" action="{{ route('mypage.destroy', ['restaurant_id'=>$reservation->restaurant->id]) }}">
                                        @csrf

                                        <button type="submit" class="cancel-done">
                                            <i class="material-icons cancel-done">highlight_off</i>
                                        </button>
                                    </form>
                                </div>
                                <div class="mypage-reserve-table-container">
                                    <table class="mypage-done-table">
                                        <tr>
                                            <td>Shop</td>
                                            <td>{{ $reservation->restaurant->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td id="date">{{ $reservation->date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Time</td>
                                            <td id="time">{{ $reservation->time }}</td>
                                        </tr>
                                        <tr>
                                            <td>Number</td>
                                            <td id="number">{{ $reservation->number }}</td>
                                        </tr>
                                    </table>
                                    {{-- Modal --}}
                                    <button type="button" class="mypage-review-btn js-modal-open">評価する</button>
                                    <div class="modal js-modal">
                                        <div class="modal-bg js-modal-close"></div>
                                        <div class="modal-content">
                                            <form method="post" action="{{ route('mypage.review', ['restaurant_id'=>$reservation->restaurant->id]) }}">
                                                @csrf

                                                <div class="review">
                                                    <div class="review-bar">
                                                        <span class="review-box-text">{{ $reservation->restaurant->name }}</span>
                                                    </div>
                                                    <div class="review-container">
                                                        @error('password')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <div class="review-input-box">
                                                            <div class="rate-form">
                                                                <input id="star5" type="radio" name="rate" value="5">
                                                                <label for="star5">★</label>
                                                                <input id="star4" type="radio" name="rate" value="4">
                                                                <label for="star4">★</label>
                                                                <input id="star3" type="radio" name="rate" value="3">
                                                                <label for="star3">★</label>
                                                                <input id="star2" type="radio" name="rate" value="2">
                                                                <label for="star2">★</label>
                                                                <input id="star1" type="radio" name="rate" value="1">
                                                                <label for="star1">★</label>
                                                            </div>
                                                            {{-- <input type="text" name="star" placeholder="star" value="{{ old('star') }}" class="password"> --}}
                                                        </div>
                                                        <div class="review-input-box">
                                                            <textarea name="comment" class="review-textarea" placeholder="Review" value="{{ old('comment') }}"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="review-input-box">
                                                        <input type="submit" class="review-btn" value="送信">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                        @endif
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
