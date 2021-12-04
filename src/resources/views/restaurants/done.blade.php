<x-restaurant>
    <x-slot name="title">
        Done page
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
    </header>
    <main>
        <div class="done">
            <span class="done-txt">ご予約ありがとうございます</span>
            <div class="done-input-box">
                <a href="{{ route('restaurants.index') }}" class="card-detail-btn">戻る</a>
            </div>
        </div>
    </main>
</x-restaurant>
