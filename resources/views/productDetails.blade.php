@extends('layout')

@section('title', 'Discover our Collection')

@section('content')
<div class="productDetailsContainer">
    <div class="productDetailsImageContainer">
        <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->title }}" />
    </div>
    <div class="productDescriptionContainer">
        <h2 class="productName">{{ $watch->title }}</h2>
        <p class="price">RM {{ $watch->price }}</p>
        <p class="productDescription">{{ $watch->description }}</p>
        <div class="material">
            <strong>Material Type: </strong>
            <span>{{ $watch->material_type }}</span>
        </div>
        <div class="origin">
            <strong>Made In: </strong>
            <span>{{ $watch->origin }}</span>
        </div>
        <div class="strapColor">
            <strong>Strap Color: </strong>
            <span>{{ $watch->strap_color }}</span>
        </div>

        <div class="quantity">  
            <span>Quantity: </span>
            <input type="number" value="1" />
        </div>

        @if(auth()->user()->role == 'admin')
            <button class="productEditButton" onclick="redirectToProductEditPage('{{ $watch->id }}')">Edit</button>
            <form id="deleteForm_{{ $watch->id }}" action="/products/{{ $watch->id }}/delete" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="productDeleteButton" onclick="confirmDelete({{ $watch->id }})">Delete</button>
            </form>
        @else
            <button class="addToCartButton">Add to Cart</button>
        @endif
    </div>
</div>

<div class="productReviewContainer">
    <h2>Reviews</h2>
    <p>Read Reviews from Our Satisfied Customers. Share Your Experience with Us by clicking the below button!
    </p>
    <button id="reviewButton">Submit Your Review</button>
</div>

<div class="commentsContainer">
    @foreach($watch->comments as $comment)
        <div class="commentContainer">
            <div class="commentContainerHeader">
                <p class="author">{{ $comment->author }}</p>
                @if(auth()->user()->role=='admin'||auth()->user()->id==$comment->user_id)
                    <form action="/products/{{ $watch->id }}/delete/{{$comment->id}}}" method="post">
                        @csrf
                        <button class="productCommentDeleteButton" type="submit" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                    </form>
                @endif          
            </div>
            <p class="title">{{ $comment->comment_title }}</p>
            <div class="commentRatingStarContainer">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $comment->comment_star_rating)
                        <span class="lightedStar">★</span>
                    @else
                        <span class="dullStar">★</span>
                    @endif
                @endfor
            </div>
            <p class="body">{{ $comment->comment_body }}</p>
        </div>
    @endforeach
</div>



<div id="reviewModal" class="modal">
    <div class="modalContent">
        <div class="modalHeader">
            <h2>Submit Your Review</h2>
            <button id="modalCloseButton">&times;</button>
        </div>
        <form id="reviewForm" action="/products/{{$watch->id}}/create/review" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label for="author">Name</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="title">Review Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <div class="star-rating">
                    <input type="radio" name="rating" id="rate5" value="5">
                    <label for="rate5">★</label>

                    <input type="radio" name="rating" id="rate4" value="4">
                    <label for="rate4">★</label>

                    <input type="radio" name="rating" id="rate3" value="3">
                    <label for="rate3">★</label>

                    <input type="radio" name="rating" id="rate2" value="2">
                    <label for="rate2">★</label>
                    
                    <input type="radio" name="rating" id="rate1" value="1">
                    <label for="rate1">★</label>
                </div>
            </div>
            <div class="form-group">
                <label for="body">Review</label>
                <textarea id="body" name="body" rows="5" required></textarea>
            </div>
            <button type="submit">Submit Review</button>
        </form>
    </div>
</div>

<script>
    function confirmDelete(id) {
        let confirmation = confirm("Are you sure you want to delete this product?");
        if (confirmation) {
            document.getElementById('deleteForm_' + id).submit();
        }
    }

    function redirectToProductEditPage(productId) {
        window.location.href = '/products/' + productId+'/edit';
    }

    document.addEventListener('DOMContentLoaded', (event) => {

        var modal = document.getElementById("reviewModal");
        const reviewButton = document.getElementById("reviewButton")
        const modalCloseButton = document.getElementById("modalCloseButton");

        reviewButton.onclick = function() {
            modal.style.display = "block";
        }

        modalCloseButton.onclick = function() {
            modal.style.display = "none";
        }
    });

</script>
@endsection
