@extends('layout')

@section('title', 'Profile')

@section('content')
<div class="profileContainer">
    <div class="profileImageContainer">
        <img src="https://picsum.photos/1600/1600" alt="Profile Image" />
    </div>
    <div class="profileInfoContainer">
        <div class="formContainer">
            <form action="/profile/edit" method="post">
                @csrf
                <h2>Profile</h2>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" required>

                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" disabled>

                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ auth()->user()->address }}">

                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ auth()->user()->phone }}">

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
