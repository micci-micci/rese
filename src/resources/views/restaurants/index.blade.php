<x-layout>
    <x-slot name="title">
        Restaurants page
    </x-slot>
    <x-alert type="success" :session="session('success')" />
    @csrf

    <header>
        <x-humberger>
        </x-humberger>
        <div class="search-bar">
            <form method="post" action="{{ route('search') }}">
                @csrf

                <div class="search-area">
                    <select name="area">
                        <option value="" hidden>All area</option>
                        <option value="13">東京都</option>
                        <option value="40">福岡県</option>
                        <option value="27">大阪府</option>
                    </select>
                </div>
                <div class="search-category">
                    <select name="category">
                        <option value="" hidden>All genre</option>
                        <option value="1">寿司</option>
                        <option value="2">焼肉</option>
                        <option value="3">居酒屋</option>
                        <option value="4">イタリアン</option>
                        <option value="5">ラーメン</option>
                    </select>
                </div>
                <span class="material-icons search-icon">search</span>
                <div class="search-box">
                    <input type="search" name="search" placeholder="Search..." class="search-input">
                </div>
            </form>
        </div>
    </header>
    <main>
        <div class="wrap">
            @foreach ($restaurants as $restaurant)
            <div class="card card-radius">
                <form method="get" action="">
                @csrf

                    <div class="card-header">
                        <figure class="card-thumbnail">
                            <img src="{{ $restaurant->image_url }}">
                        </figure>
                    </div>
                    <div class="card-body">
                        <p class="card-title">{{ $restaurant->name }}</p>
                        <div class="card-tag-wrapper">
                            <p class="card-tag-text">#{{ $restaurant->area->name }}</p>
                            <p class="card-tag-text">#{{ $restaurant->category->name }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('restaurants.datail', [$restaurant->id]) }}" class="card-detail-btn">詳しく見る</a>
                            @auth
                                @inject('favorite', 'App\Models\Favorite')
                                @if ($favorite->isFavoritedBy(Auth::user(), $restaurant->id))
                                    <span class="favorite-toggle" user_id={{ auth()->user()->id }} restaurant_id={{ $restaurant->id }} favorite_count=1>
                                        <i class="material-icons favorited">favorite</i>
                                    </span>
                                @else
                                <span class="favorite-toggle" user_id={{ auth()->user()->id }} restaurant_id={{ $restaurant->id }} favorite_count=0>
                                    <i class="material-icons favorite">favorite</i>
                                </span>
                                @endif
                            @endauth
                            @guest
                                <a href="{{ route('restaurants.favorite') }}" class="material-icons favorite">favorite</a>
                            @endguest
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </main>
</x-layout>
