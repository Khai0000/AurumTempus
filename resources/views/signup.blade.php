<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productDetails.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="loginContainer">
        <h1>Aurum Tempus</h1>
        <div class="loginFormContainer">
            <h2>Sign up</h2>
            <form action="/signup" method="post">
                @csrf
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Sign up</button>
            </form>
            <p class="signupLink">Don't have an account? <a href="/login">Login</a></p>
        </div>
    </div>

    <script>
        // Display success message
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    
        // Display error message
        @if(session('error'))
            toastr.error('{{ session('error') }}');
        @endif
    
        // Display validation errors
        @if($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif
    </script>    
</body>

</html>