<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel + Vue = ❤️</title>
    <style>
        html body {
            background: #1582dd;
        }
    </style>
</head>
<body>
<div id="app">
    <display id="{{$id}}"></display>
</div>
<script src="{{ asset('js/main-s.js') }}"></script>
</body>
</html>
