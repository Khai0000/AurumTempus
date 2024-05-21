<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.cdnfonts.com/css/cabinet-grotesk" rel="stylesheet">
    <title>@yield('title', 'T!mex')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productPage.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="/">Aurum Tempus</a></div>
            <ul>
                <li><a href="/products">Shop All</a></li>
                <li><a href="#">Company</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div class="icons">
                <img class="cart-icon" src="{{ asset('assets/shopping-bag.png') }}" />
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Aurum Tempus. All rights reserved.</p>
    </footer>
</body>
</html>
