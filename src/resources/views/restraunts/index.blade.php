<x-layout>
    <x-slot name="title">
        Contact page
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
</x-layout>
