@extends('layout')

@section('title', 'Discover our Collection')

@section('content')
<div class="productDetailsContainer">
    <div class="productDetailsImageContainer">
        <img src="{{asset("assets/watch2-removebg-preview.png")}}" alt="Watch on sales" />
    </div>
    <div class="productDescriptionContainer">
        <h2 class="productName">Stirling Analog White Dial Watch</h2>
        <p class="price">RM 98.00</p>
        <p class="productDescription">Son agreed to others exeter period myself few yet nature. Mention mr
            manners opinion if garrets enabled. To occasional dissimilar</p>
        <div class="material">  
            <strong>Material Type: </strong>
            <span>Leather</span>
        </div>
        <div class="origin">
            <strong>Made In: </strong>
            <span>London</span>
        </div>
        <div class="strapColor">
            <strong>Strap Color: </strong>
            <span>Coffee</span>
        </div>

        <div class="quantity">
            <span>Quantity: </span>
            <input type="number" value="1" />
        </div>

        <button class="addToCartButton">Add to Cart</button>
    </div>
</div>

<div class="productReviewContainer">
    <h2>Reviews</h2>
    <p>Read Reviews from Our Satisfied Customers. Share Your Experience with Us by clicking the below button!
    </p>
    <button>Submit Your Review</button>
</div>

<div class="commentsContainer">
    <div class="commentContainer">
        <p class="author">Frances Guerrero</p>
        <p class="title">A must-have product</p>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
        </div>
        <p class="body">"But in certain circumstances and owing to the claims of duty or the obligations of
            business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The
            wise man therefore always."</p>
    </div>
    <div class="commentContainer">
        <p class="author">Frances Guerrero</p>
        <p class="title">A must-have product</p>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
        </div>
        <p class="body">"But in certain circumstances and owing to the claims of duty or the obligations of
            business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The
            wise man therefore always."</p>
    </div>
    <div class="commentContainer">
        <p class="author">Frances Guerrero</p>
        <p class="title">A must-have product</p>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
        </div>
        <p class="body">"But in certain circumstances and owing to the claims of duty or the obligations of
            business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The
            wise man therefore always."</p>
    </div>
    <div class="commentContainer">
        <p class="author">Frances Guerrero</p>
        <p class="title">A must-have product</p>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars">★</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars">★</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars">★</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars">★</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">★</label>
        </div>
        <p class="body">"But in certain circumstances and owing to the claims of duty or the obligations of
            business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The
            wise man therefore always."</p>
    </div>
</div>
@endsection
