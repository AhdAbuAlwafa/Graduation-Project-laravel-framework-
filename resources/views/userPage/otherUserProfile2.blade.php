<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>صفحة مهني</title>
    <link href="{{ asset('assets/css/otherUserProfile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('style/css/style.css?version=1') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">


</head>

<body>
    <div>
        <div>
            <!----------------navbar------------------->
            @include('shared.navbar')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <div class="header__wrapper">
            <header></header>
            <div class="cols__container">
                <div class="left__col">
                    <div class="img__container">
                        <img src="{{ 'images/' . auth()->user()->image }}" alt="صائب صلاح " />
                    </div>

                    <div class="center1">
                        <div class="stars1">
                            <input type="radio" id="one1" name="rate1" value="1">
                            <h2 for="one">@for ($i = 1; $i <= 5; $i++) @if ($i <=round($userRate)) <i class=" fas fa-star fa-2xl active  text-warning"></i>

                                    @else
                                    <i class=" fas fa-star fa-2xl  " data-rating="{{ $i }}"></i>

                                    @endif
                                    @endfor
                            </h2>
                            <span class="result"></span>
                        </div>
                    </div>
                    <h2>{{$worker->fname}}</h2>
                    <h1>@foreach($worker->crafts as $craft)
                        {{$craft->craft_name}} <b> , </b>
                        @endforeach
                    </h1>
                    <ul class="evaluation">
                        <div class="center">
                            <div class="stars">
                                <div class="col-md-6 col-lg-3 bigcard" id="search-results">

                                    <div class="rating">

                                        <h2 class="active">
                                            {{round($userRate,1)}}


                                        </h2>

                                    </div>
                                    <div class="rating row">
                                        @for ($i = 1; $i <= 5; $i++) <a><i class="star fas fa-star " data-rating="{{ $i }}"></i></a>
                                            @endfor
                                    </div>
                                    <p id="selected-rating"></p>

                                </div>
                            </div>
                        </div>

                    </ul>
                    <button id="reset-rating" style="display: none;">Reset Rating</button>


                    <div id="alert-message" style="display: none;">
                        <p>Rating successfully completed!</p>
                        <button onclick="refreshPage()">Okay</button>
                    </div>

                    <div class="content">
                        <p>
                            {{$worker->description}}
                        </p>

                    </div>
                </div>




                <div class="second-part">
                    <div class="place">
                        <label>المكان : </label>
                        <span class="city"> {{$worker->addresses->city_name}} </span>
                        <label>/</label>
                        <span class="village"> {{$worker->addresses->village_name}}</span>
                    </div>

                    <div id="vertical-line"></div>
                    <div class="phone-num">
                        <label> رقم الهاتف : </label>
                        <span class="num">{{$worker->number}}</span>
                    </div>

                    <div id="vertical-line"></div>
                    <div class="worker-gender">
                        <label> الجنس : </label>
                        <span class="gender">
                            @if ($worker->gender == 0)
                            ذكر
                            @elseif ($worker->gender == 1)
                            أنثى
                            @endif
                        </span>
                    </div>



                    <div id="vertical-line"></div>
                    <div class="container mt-5">
                        <div class="d-flex justify-content-center row">
                            <div class="col-md-8">

                                <div class="bg-light p-2" style="width: 550px; margin-left: 400px;">
                                    <div class="d-flex flex-row align-items-start">
                                        <img src="assets/img/user-page.jpg" alt="" class="rounded-circle" width="90" height="90" style="margin: 12px;  box-shadow: 3px 5px 14px rgba(0, 0, 0, 0.5); border: 4px solid white;">
                                        <form id="commentForm" action="{{ route('user_comment.store', ['id' => $worker->id]) }}" method="post">
                                            @csrf
                                            <div class="form-floating">
                                                <textarea class="form-control" id="commentadd" rows="3" name="com_text" placeholder="اكتب تعليقك هنا " id="floatingTextarea2" style="height: 100px ; width: 400px;"></textarea>
                                                <label for="floatingTextarea2">اكتب تعليق</label>
                                                @error('com_text')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-2 text-right comm-foter">
                                        <button id="postCommentBtn">نشر التعليق</button>
                                    </div>
                                </div>

                                <div class="bg-light p-2" style="width: 550px; margin-top: 50px;">
                                    <div id="commentsContainer">
                                        @if ($worker->receivedComments)
                                        @foreach ($receivedComments as $comment)
                                        @include('userPage.partial', ['comment' => $comment])
                                        @endforeach
                                        @else
                                        No comments found.
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

   

document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');
        const selectedRatingDisplay = document.getElementById('selected-rating');
        const resetButton = document.getElementById('reset-rating'); 
        let selectedRating = '<?php echo $isRated->rate ?? 0; ?>';
        highlightStars(selectedRating);

        stars.forEach(function(star) {
            star.addEventListener('mouseenter', function() {
                const rating = parseInt(star.dataset.rating);
                highlightStars(rating);
            });

            star.addEventListener('mouseleave', function() {
                highlightStars(selectedRating);
            });

            star.addEventListener('click', function() {
                const rating = parseInt(star.dataset.rating);
                selectedRating = rating;
                updateRatingDisplay();
                resetButton.removeAttribute('disabled');
                // Show the alert message
                const alertMessage = 'Rating successfully completed!';
                window.alert(alertMessage);
                refreshPage();
            });
        });

        resetButton.addEventListener('click', function() {
            selectedRating = 0;
            updateRatingDisplay();
            resetButton.setAttribute('disabled', true);
        });

        function highlightStars(rating) {
            stars.forEach(function(star) {
                const starRating = parseInt(star.dataset.rating);
                if (starRating <= rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

        function updateRatingDisplay() {
            if (selectedRating !== 0) {
                const id = '<?php echo $worker->id; ?>';
                $.ajax({
                    type: 'POST',
                    url: "/sendrate",
                    data: {
                        id: id,
                        rate: selectedRating,
                        _token: '{{ csrf_token() }}',
                        _method: 'post'
                    },
                    success: function() {
                        // Do nothing, the rating is successfully updated
                    }
                });
            } else {
                selectedRatingDisplay.textContent = 'No rating selected.';
                stars.forEach(function(star) {
                    star.classList.remove('active');
                });
            }
        }

        // Function to refresh the page
        function refreshPage() {
            window.location.reload();
        }
    });

</script>

        <script>
            $(document).ready(function() {
                // Intercept the form submission event
                $('#commentForm').submit(function(event) {
                    event.preventDefault(); // Prevent the form from submitting normally

                    // Get the form data
                    var formData = $(this).serialize();

                    // Send an AJAX request to submit the form
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Clear the comment textarea
                            $('#commentadd').val('');

                            // Append the new comment HTML to the comments container
                            var newComment = $(response.commentHtml);
                            newComment.css('background-color', 'red');
                            $('#commentsContainer').append(newComment);

                            // Remove the background color after 3 seconds
                            setTimeout(function() {
                                newComment.css('background-color', 'transparent');
                            }, 3000);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error(errorThrown);
                        }
                    });
                });

                // Handle the click event of the "نشر التعليق" button
                $('#postCommentBtn').click(function() {
                    $('#commentForm').submit();
                });
            });
        </script>
</body>