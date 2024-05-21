<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.cdnfonts.com/css/cabinet-grotesk" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title', 'Aurum Tempus')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productDetails.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="/">Aurum Tempus</a></div>
            <ul>
                <li><a href="/products">Watches</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contactUs">Contact Us</a></li>
                <li><a href="#">Profile</a></li>
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
