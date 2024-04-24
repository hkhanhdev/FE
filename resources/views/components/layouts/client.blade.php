<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laptop Shop</title>
    @include("assets.css-js")
</head>
<body class="font-sans">
{{$slot}}
</body>
</html>
