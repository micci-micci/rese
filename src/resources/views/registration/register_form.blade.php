<x-layout>
    <x-slot name="title">
        register page
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
        <form method="post" action="{{ route('thanks') }}">
            @csrf
            <x-alert type="danger" :session="session('danger')" />

            {{-- <div class="error-container">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="register">
                <div class="register-bar">
                    <span class="register-box-text">Registration</span>
                </div>
                <div class="register-container">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="register-input-box">
                        <span class="material-icons register-icon">face</span>
                        <input type="text" name="name" placeholder="Username">
                    </div>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="register-input-box">
                        <span class="material-icons register-icon">email</span>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="register-input-box">
                        <span class="material-icons register-icon">lock</span>
                        <input type="text" name="password" placeholder="Password">
                    </div>
                    <div class="register-input-box-right">
                        <input type="submit" class="register-btn" value="登録">
                    </div>
                </div>
            </div>
        </form>
    </main>
</x-layout>
