<x-layout>
    <x-slot name="title">
        Done page
    </x-slot>

    <header>
        <x-humberger>
        </x-humberger>
    </header>
    <main>
        @can('isAdmin')
            <h1>管理者ですね</h1>
        @else
            <h1>管理者じゃないぞ！</h1>
        @endcan
    </main>
</x-layout>
