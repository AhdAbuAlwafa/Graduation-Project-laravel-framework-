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
        <div dir="ltr">
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
                        <div class="stars1 ">


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
                                <input type="radio" id="five" name="rate" value="5">
                                <label for="five"></label>
                                <input type="radio" id="four" name="rate" value="4">
                                <label for="four"></label>
                                <input type="radio" id="three" name="rate" value="3">
                                <label for="three"></label>
                                <input type="radio" id="two" name="rate" value="2">
                                <label for="two"></label>
                                <input type="radio" id="one" name="rate" value="1">
                                <label for="one"></label>
                                <span class="result"></span>
                            </div>
                        </div>
                    </ul>
                    <button id="reset-rating" style="display: none;">Reset Rating</button>


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


      <!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

<!-- Your HTML content -->

<!-- Your JavaScript code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.stars input');
        const ratingResult = document.querySelector('.result');
        let selectedRating = '<?php echo $isRated->rate ?? 0; ?>';

        stars.forEach(function(star) {
            star.addEventListener('mouseenter', function() {
                const rating = parseInt(star.value);
                highlightStars(rating);
            });

            star.addEventListener('mouseleave', function() {
                highlightStars(selectedRating);
            });

            star.addEventListener('click', function() {
                const rating = parseInt(star.value);
                selectedRating = rating;
                updateRatingDisplay();
                // Show the SweetAlert popup for the successful rating completion
                showSweetAlert();
            });
        });

        function highlightStars(rating) {
            stars.forEach(function(star) {
                const starRating = parseInt(star.value);
                if (starRating <= rating) {
                    star.parentElement.classList.add('active');
                } else {
                    star.parentElement.classList.remove('active');
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
                    }
                });
            } else {
                ratingResult.textContent = 'No rating selected.';
                stars.forEach(function(star) {
                    star.parentElement.classList.remove('active');
                });
            }
        }

        function showSweetAlert() {
            Swal.fire({
                icon: 'success',
                title: 'لقد تم التقييم بنجاح!',
                text: 'شكرا لك للتقييم!',
                showConfirmButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    refreshPage();
                }
            });
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