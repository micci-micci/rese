<x-layout>
    <x-slot name="title">
        Done page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        <div class="done">
            <span class="done-txt">投稿ありがとうございます。</span>
            <div class="done-input-box">
                <a href="{{ route('mypage') }}" class="card-detail-btn">戻る</a>
            </div>
        </div>
    </main>
</x-layout>
