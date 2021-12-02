<x-restaurant>
    <x-slot name="title">
        Restaurants page
    </x-slot>

    <main-detail>
        <div class="parent-container">

            <div class="child-container">
                <div class="container">
                    <div id="ditail-humberger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <h1 class="ditail-menu_title">Rese</h1>
                </div>
                <div class="back-container">
                    <span class="back-box">
                        <button type="button" onClick="history.back()" class="material-icons arrow-back-icon">chevron_left</button>
                    </span>
                    <h1 class="back-title">{{ $restaurant->name }}</h1>
                </div>
                <div class="detail-card">
                    <form method="get" action="">
                    @csrf

                        <div class="detail-card-header">
                            <figure class="detail-card-thumbnail">
                                <img src={{ $restaurant->image_url }}>
                            </figure>
                        </div>
                        <div class="detail-card-body">
                            <p class="detail-card-title"></p>
                            <div class="detail-card-tag-wrapper">
                                <p class="detail-card-tag-text">#{{ $restaurant->area->name }}</p>
                                <p class="detail-card-tag-text">#{{ $restaurant->category->name }}</p>
                            </div>
                            <p class="detail-card-txt">{{ $restaurant->description }}</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="child-container">
                <div class="reserve-box">
                    <div class="reserve-container">
                        <h1 class="reserve-title">予約</h1>
                        <input type="date" class="reserve-input-space"></input>
                        <input type="time" class="reserve-input-space reserve-input-width"></input>
                        <input type="number" class="reserve-input-space reserve-input-width" value="1" min="1"></input>
                        {{-- 予約情報をのせる --}}
                        <div class="reserve-info"></div>
                    </div>
                    <div class="reserve-btn">
                        <p class="reserve-btn-txt">予約する</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-restaurant>
