<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-alert type="success" :session="session('success')" />

    <h1>Home</h1>
    <li>name: {{ Auth::user()->name }}</li>
    <li>email: {{ Auth::user()->email }}</li>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button class="logout-btn">ログアウト</button>
    </form>
</body>
</html>
