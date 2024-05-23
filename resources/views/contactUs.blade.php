@extends('layout')

@section('title', 'Contact Us')

@section('content')
<h1 class="contactUsTitle">
    Contact Us
</h1>

<div class="contactUsContainer">
    <div class="formContainer">
        <form action="/contactUs/create/message" method="post">
            @csrf
            <label>Name</label>
            <input type="text" name="author" id="author" >
            <label>Email Address</label>
            <input type="email" name="email" id="email">
            <label>Phone</label>
            <input type="text" name="phone" id="phone">
            <label>Message</label>
            <textarea name="message" id="message" rows="5"></textarea>

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

<div class="dividerContainer">
    <div class="divider"></div>
</div>

@if (auth()->user()->role=='admin')
<div class="contactUsInfoContainer">
    <h2>Messages Received</h2>
    @foreach ($messages as $message)
        <div class="contactUsCardContainer">
            <div class="contactUsInfoHeader">
                <p class="author">{{$message->author}}</p>
                @if(auth()->user()->role=='admin')
                    <form action="/contactUs/{{ $message->id }}/delete/message" method="post">
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                    </form>
                @endif
            </div>
            <p class="email">Email Address: {{$message->email}}</p>
            <p class="phone">Phone: {{$message->phone}}</p>
            <p class="message">{!! nl2br(e($message->message)) !!}</p>
        </div>
    @endforeach
</div>   
@endif
@endsection
