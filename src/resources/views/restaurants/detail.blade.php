<x-restaurant>
    <x-slot name="title">
        Restaurants page
    </x-slot>

    {{-- <header> --}}

    {{-- </header> --}}
    <main>

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
                        <i class="material-icons arrow-back-icon">chevron_left</i>
                    </span>
                    {{-- ToDo: ID 取得して表示させる --}}
                    <h1 class="back-title">仙人</h1>
                </div>
                {{-- レストランID を取得して割り当てる --}}
                <div class="detail-card">
                    <form method="get" action="">
                    @csrf

                        <div class="detail-card-header">
                            <figure class="detail-card-thumbnail">
                                {{-- 仮イメージ --}}
                                <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg">
                            </figure>
                        </div>
                        <div class="detail-card-body">
                            <p class="detail-card-title"></p>
                            <div class="detail-card-tag-wrapper">
                                <p class="detail-card-tag-text">#東京都</p>
                                <p class="detail-card-tag-text">#寿司</p>
                            </div>
                            <p class="detail-card-txt">料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。</p>
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
