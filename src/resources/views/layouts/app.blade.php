<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('head')
</head>

<body>
    <header class="header">
        <div class="header-inner">
            <h2 class="header-logo">FashionablyLate</h2>
            @yield('button')
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>