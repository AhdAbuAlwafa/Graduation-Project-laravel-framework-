
@extends('userPage.navbar')
    @section('content')


<div class="col-md-6 col-lg-3 bigcard" id="search-results">

<div class="container">
  <h3>{{$worker->fname}} 's rating</h3>
  <div class="rating">
    @for ($i = 1; $i <= 5; $i++)
    @if ($i <= round($userRate))
      <i class=" fas fa-star fa-2xl active  text-warning"></i>

    @else
    <i class=" fas fa-star fa-2xl  " data-rating="{{ $i }}"></i>

    @endif
    @endfor
    <h2 class="active">
    {{round($userRate,1)}}


    </h2>

  </div>
  <div class="rating">
    <h5>Your rating</h5>
    @for ($i = 1; $i <= 5; $i++)
       <a><i class="star fas fa-star " data-rating="{{ $i }}"></i></a>
    @endfor
  </div>
  <p id="selected-rating"></p>
  <button id="reset-rating" class="btn btn-primary" disabled>Reset Rating</button>
</div>

</div>
  <div class="card cardS bg-light h-100 shadow rounded bg-primary" >

  <img src="{{asset('images/'.$worker->image)}}" class="card-img-top" width="150" height="150" alt="">
      <h3 class="card-title mb-3">{{$worker->fname}}</h3>
      <hr>
      <p class="lead card-text">
        {{$worker->addresses->city_name}} <b> , </b>
      </p>
      <p class="lead card-text">
        {{$worker->addresses->village_name}} <b> , </b>
      </p>
      <p class="lead card-text" id="craft_name">
        @foreach($worker->crafts as $craft)
        {{$craft->craft_name}} <b> , </b>
        @endforeach
      </p>
      <p class="lead card-text">
        {{$worker->description}} <b> , </b>
      </p>

  </div>
  
<script>



    document.addEventListener('DOMContentLoaded', function() {
      const stars = document.querySelectorAll('.star');
      const selectedRatingDisplay = document.getElementById('selected-rating');
      const resetButton = document.getElementById('reset-rating');
      window.onload = function(){
        selectedRating = '<?php echo $isRated->rate ?? 0 ; ?>';
        highlightStars(selectedRating);
      }

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
            id = '<?php echo $worker->id; ?>';
            $.ajax({
                type : 'POST',
                url : "/sendrate",
                data : 'id='+id +'&rate=' + selectedRating  +"&_token={{ csrf_token() }} &_method=post"

            })
        } else {
          selectedRatingDisplay.textContent = 'No rating selected.';
          stars.forEach(function(star) {
            star.classList.remove('active');
          });
        }

    }
    });
  </script>
@endsection
