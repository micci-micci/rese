<x-layout>
    <x-slot name="title">
        Thanks page
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
        <form method="get" action="{{ route('login.show') }}">
            @csrf

            <div class="thanks">
                <span class="thanks-txt">会員登録ありがとうございます</span>
                <div class="thanks-input-box">
                    <button class="thanks-btn">ログイン</button>
                </div>
            </div>
        </form>
    </main>
</x-layout>
