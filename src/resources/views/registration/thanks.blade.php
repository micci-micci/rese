<x-layout>
    <x-slot name="title">
        Thanks page
    </x-slot>
    <x-alert type="success" :session="session('success')" />

    <h1>Thanks</h1>
    <div class="space"></div>
    <form method="GET" action="{{ route('login.show') }}">
        @csrf

        <button class="login-btn">ログイン</button>
    </form>
</x-layout>

