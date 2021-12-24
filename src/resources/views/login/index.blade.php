<x-layout>
    <x-slot name="title">
        Login page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        <form method="post" action="{{ route('login') }}">
            @csrf

            <x-alert type="danger" :session="session('danger')" />
            <div class="login">
                <div class="login-bar">
                    <span class="login-box-text">Login</span>
                </div>

                <div class="login-container">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="login-input-box">
                        <span class="material-icons login-icon">email</span>
                        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="login-input-box">
                        <span class="material-icons login-icon">lock</span>
                        <input type="password" name="password" placeholder="Password" class="password">
                    </div>
                    <div class="login-input-box-right">
                        <input type="submit" class="login-btn" value="ログイン">
                    </div>
                </div>
            </div>
        </form>
    </main>
</x-layout>
