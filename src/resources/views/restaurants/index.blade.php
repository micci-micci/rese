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
            <form method="get" action="{{ route('search') }}">
                <div class="search-area">
                    <select name="area" onChange="submit(this.form)">

                        @if (empty($area_id))
                            <option value="">All area</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        @else
                            <option value="99">All area</option>
                            <option value="1" @if( $area_id=="1") selected @endif>東京都</option>
                            <option value="2" @if( $area_id=="2") selected @endif>大阪府</option>
                            <option value="3" @if( $area_id=="3") selected @endif>福岡県</option>
                            {{-- @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @if( $area_id=="{{ $area->id }}") selected @endif>{{ $area->name }}</option>
                            @endforeach --}}
                        @endif
                    </select>
                </div>
                <div class="search-category">
                    <select name="category" onChange="submit(this.form)">
                        @if (empty($category_id))
                            <option value="">All area</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @else
                            <option value="99">All area</option>
                            <option value='1' @if( $category_id=='1') selected @endif>寿司</option>
                            <option value='2' @if( $category_id=='2') selected @endif>焼肉</option>
                            <option value='3' @if( $category_id=='3') selected @endif>居酒屋</option>
                            <option value='4' @if( $category_id=='4') selected @endif>イタリアン</option>
                            <option value='5' @if( $category_id=='5') selected @endif>ラーメン</option>
                        @endif

                        {{-- @if (empty($category))
                            <option value="">All genre</option>
                            <option value="1">寿司</option>
                            <option value="2">焼肉</option>
                            <option value="3">居酒屋</option>
                            <option value="4">イタリアン</option>
                            <option value="5">ラーメン</option>
                        @else
                            <option value="">All genre</option>
                            <option value='1' @if( $category=='1') selected @endif>寿司</option>
                            <option value='2' @if( $category=='2') selected @endif>焼肉</option>
                            <option value='3' @if( $category=='3') selected @endif>居酒屋</option>
                            <option value='4' @if( $category=='4') selected @endif>イタリアン</option>
                            <option value='5' @if( $category=='5') selected @endif>ラーメン</option>
                        @endif --}}
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
                                <a href="{{ route('login') }}" class="material-icons favorite">favorite</a>
                            @endguest
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </main>
</x-layout>
