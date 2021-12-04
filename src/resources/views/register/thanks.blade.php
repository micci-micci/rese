<x-layout>
    <x-slot name="title">
        Thanks page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        <div class="thanks">
            <span class="thanks-txt">会員登録ありがとうございます</span>
            <div class="thanks-input-box">
                <a href="{{ route('login') }}" class="thanks-btn">ログインする</a>
            </div>
        </div>
    </main>
</x-layout>
