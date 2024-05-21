@extends('layout')

@section('title', 'Profile')

@section('content')
<div class="profileContainer">
    <div class="profileImageContainer">
        <img src="https://picsum.photos/1600/1600" alt="Profile Image" />
    </div>
    <div class="profileInfoContainer">
        <div class="formContainer">
            <form action="" method="post">
                <h2>Profile</h2>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">

                <label for="email">Email Address</label>
                <input type="email" name="email" id="email">

                <label for="address">Address</label>
                <input type="text" name="address" id="address">

                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone">

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
