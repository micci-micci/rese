<x-layout>
    <x-slot name="title">
        Login page
    </x-slot>
    <x-alert type="success" :session="session('success')" />

    <h1>Home</h1>
    <li>Name: {{ Auth::user()->name }}</li>
    <li>Email: {{ Auth::user()->email }}</li>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button class="logout-btn">ログアウト</button>
    </form>
</x-layout>
