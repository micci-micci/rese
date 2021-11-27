<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="http://localhost:8080/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8080/css/common.css">
    <link rel="stylesheet" href="http://localhost:8080/css/style.css">

    {{-- Bootstrap --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- Google Material Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    {{ $slot }}
</body>
</html>
