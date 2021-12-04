<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="http://localhost:8080/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8080/css/common.css">
    <link rel="stylesheet" href="http://localhost:8080/css/restaurant.css">
    <script src="{{ mix("js/favorite.js") }}"></script>
    <script src="{{ mix("js/reserve.js") }}"></script>
    <script src="{{ mix("js/humberger.js") }}"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    {{ $slot }}
</body>
</html>
