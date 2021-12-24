<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/restaurant.css">
    <link rel="stylesheet" href="/css/mypage.css">
    <link rel="stylesheet" href="/css/management.css">
    <script src="{{ mix("js/humberger.js") }}"></script>
    <script src="{{ mix("js/favorite.js") }}"></script>
    <script src="{{ mix("js/reserve.js") }}"></script>
    <script src="{{ mix("js/modal.js") }}"></script>
    <script src="{{ mix("js/delete.js") }}"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    {{ $slot }}
</body>
</html>
