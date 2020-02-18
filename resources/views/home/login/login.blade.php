<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>用户登录❤️</title>
</head>
<body>
<div id="app"></div>
<script src="{{ asset('js/main-login.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
