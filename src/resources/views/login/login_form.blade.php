<x-layout>
    <x-slot name="title">
        Login page
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
        <form method="post" action="">
            <div class="login">
                <div class="login-bar">
                    <span class="login-box-text">Login</span>
                </div>
                <div class="login-container">
                    <div class="login-input-box">
                        <span class="material-icons login-icon">email</span>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div class="login-input-box">
                        <span class="material-icons login-icon">lock</span>
                        <input type="text" name="password" placeholder="Password">
                    </div>
                    <div class="login-input-box-right">
                        <input type="submit" class="login-btn" value="ログイン">
                    </div>
                </div>
            </div>
        </form>
    </main>
</x-layout>
