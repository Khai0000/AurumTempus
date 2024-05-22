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
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cartSideBar.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="/">Aurum Tempus</a></div>
            <ul>
                <li><a href="/products">Watches</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contactUs">Contact Us</a></li>
                <li><a href="/profile">Profile</a></li>
            </ul>
            <div class="icons">
                <img class="cart-icon" id="cartButton" src="{{ asset('assets/shopping-bag.png') }}" />
                
                @auth
                    <img class="cart-icon" src="{{ asset('assets/logoutIcon.png') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" />
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <aside class="cart-sidebar" id="cartSidebar">
        <div class="cart-content" id="cartSideContent">
            <div class="cartSideContainer">
                <div class="cartHeader">
                    <h2>Your Cart</h2>
                    <button id="cartCloseButton">X</button>
                </div>
                <div class="cart-item">
                    <p>Michael Kors Access White Dial Men Watch</p>
                    <p>$158.00 USD</p>
                </div>
                <div class="cart-item">
                    <p>Vacheron Constantin Overseas Men Watch</p>
                    <p>$95.00 USD</p>
                </div>
                <div class="cart-item">
                    <p>The Octagon With Leather Strap Watch</p>
                    <p>$188.00 USD</p>
                </div>
                <div class="cart-subtotal">
                    <p>Subtotal: $1,101.00 USD</p>
                    <button>Checkout</button>
                </div>
            </div>
        </div>
    </aside>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartButton = document.getElementById('cartButton');
            const cartSidebar = document.getElementById('cartSidebar');
            const cartSideContent = document.getElementById('cartSideContent');
            const cartCloseButton = document.getElementById('cartCloseButton');

            cartButton.addEventListener('click', function () {
                cartSidebar.classList.toggle('open');
                cartSideContent.classList.toggle('open');
            });

            cartCloseButton.addEventListener('click', function () {
                cartSidebar.classList.toggle('open');
                cartSideContent.classList.toggle('open');
            });
        });
    </script>
    <footer>
        <p>&copy; 2024 Aurum Tempus. All rights reserved.</p>
    </footer>
</body>
</html>
