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
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cartSideBar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blogDetails.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editBlog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reviewModal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
            </div>
        </div>
    </aside>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartButton = document.getElementById('cartButton');
            const cartSidebar = document.getElementById('cartSidebar');
            const cartSideContent = document.getElementById('cartSideContent');
            let cartCloseButton = document.getElementById('cartCloseButton');
        
            cartButton.addEventListener('click', function () {
                fetchCartItems();
                cartSidebar.classList.toggle('open');
                cartSideContent.classList.toggle('open');
            });
        
            cartCloseButton.addEventListener('click', function () {
                cartSidebar.classList.toggle('open');
                cartSideContent.classList.toggle('open');
            });
        
            function fetchCartItems() {
                fetch('/cartItems')
                    .then(response => response.json())
                    .then(data => {
                        const cartSideContainer = document.querySelector('.cartSideContainer');
                        const cartItems = data.cartItems;
                        cartSideContainer.innerHTML = ''; 

                        let cartHtml = `
                            <div class="cartHeader">
                                <h2>Your Cart</h2>
                                <button id="cartCloseButton">X</button>
                            </div>
                        `;
                        
                        cartItems.forEach(item => {
                            cartHtml += `
                                <div class="cartItem">
                                    <div class="cartImageContainer">
                                        <img src="{{ asset('storage/') }}/${item.watch.image}" alt="${item.watch.title}" />
                                    </div>
                                    <div class="cartItemInfo">
                                        <p class="itemTitle">${item.watch.title}</p>
                                        <p class="itemPrice">RM${item.watch.price}</p>
                                        <div class="itemRemoveContainer">
                                            <p class="itemQuantity">Quantity: ${item.quantity}</p>
                                            <button id="removeItemButton" class='itemRemoveLink'>Remove</button>
                                            <form id="removeItemForm" action="/cartItems/${item.id}/remove" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        
                        if(cartItems.length===0)
                        {
                            cartHtml += `
                                <div class="cartItem">
                                    <div class="cartItemInfo">
                                        <p class="itemTitle">Add Something to your cart...</p>
                                    </div>
                                </div>
                            `;  
                        }

                        cartHtml += `
                            <div class="cart-subtotal">
                                <p><strong>Subtotal: </strong>RM${cartItems.reduce((total, item) => total + item.watch.price * item.quantity, 0)}</p>
                                <button type="submit" id="checkoutButton" class="cartCheckoutButton">Checkout</button>
                                <form id="checkoutForm" action="/cartItems/removeAll" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        `;
        
                        cartSideContainer.innerHTML = cartHtml;
        
                        cartCloseButton = document.getElementById('cartCloseButton');
                        cartCloseButton.addEventListener('click', function () {
                            cartSidebar.classList.toggle('open');
                            cartSideContent.classList.toggle('open');
                        });

                        const checkoutButton = document.getElementById('checkoutButton');

                        checkoutButton.addEventListener('click', function (event) {
                            event.preventDefault(); 

                            const confirmCheckout = confirm('Are you sure you want to proceed with checkout?');

                            if (confirmCheckout) {
                                document.getElementById('checkoutForm').submit();
                            }
                        });

                        const removeItemButton = document.getElementById('removeItemButton');

                        removeItemButton.addEventListener('click', function (event) {
                            event.preventDefault(); 

                            const confirmRemove = confirm('Are you sure you want to remove this item?');

                            if (confirmRemove) {
                                document.getElementById('removeItemForm').submit();
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching cart items:', error));
            }
        });
    </script>        
    <footer>
        <p>&copy; 2024 Aurum Tempus. All rights reserved.</p>
    </footer>
</body>
</html>
