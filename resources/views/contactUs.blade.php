@extends('layout')

@section('title', 'Contact Us')

@section('content')
<h1 class="contactUsTitle">
    Contact Us
</h1>

<div class="contactUsContainer">
    <div class="formContainer">
        <form action="" method="post">
            <label>Name</label>
            <input type="text" name="name" id="name">
            <label>Email Address</label>
            <input type="email" name="email" id="email">
            <label>Phone</label>
            <input type="text" name="phone" id="phone">
            <label>Message</label>
            <textarea name="" id="" rows="5"></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="contactInfoContainer">
        <h2>Need to get in touch?</h2>
        <p>Visit store:</p>
        <p class="p-divider">775, Jalan 17/29, Seksyen 17, 46400 Petaling Jaya, Selangor.</p>
        <p>Call us:</p>
        <p class="p-divider">+6012345678</p>
        <p>Mail us:</p>
        <p class="p-divider">AurumTempus@gmail.com</p>
        <p>Follow us:</p>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>

</div>
<div class="locationImageContainer">
    <h3>Locate Us on Map</h3>
    <img src="{{asset('assets/location.png')}}" />
</div>
@endsection
