<x-restaurant>
    <x-slot name="title">
        Restaurants page
    </x-slot>

    <header>
        <div class="container">
            <div id="humberger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1 class="menu_title">Rese</h1>
        </div>
        <div class="search-bar">
            <form method="post" action="">
                <div class="search-area">
                    <select name="area">
                        <option value="" hidden>All area</option>
                        <option value="1">東京都</option>
                        <option value="2">福岡県</option>
                        <option value="3">大阪府</option>
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
                    <input type="search" name="search" placeholder="Search...">
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
                            <input type="submit" class="card-detail-btn" value="詳しく見る">
                            @auth
                                @if (!$favorite->isFavoritedBy(Auth::user()))
                                    <i class="material-icons favorite-icon favorite-toggle">favorite</i>
                                @else
                                    <i class="material-icons favorited-icon">favorite</i>
                                @endif
                            @endauth
                            @guest
                                <i class="material-icons favorite-icon">favorite</i>
                            @endguest
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </main>
</x-restaurant>
