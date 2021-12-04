<x-restaurant>
    <x-slot name="title">
        Done page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
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
