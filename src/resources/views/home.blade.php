<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (session('login_sucess'))
        {{ session('login_sucess') }}
    @endif
    <h1>Home</h1>
    <li>name: {{ Auth::user()->name }}</li>
    <li>email: {{ Auth::user()->email }}</li>
</body>
</html>
