
    @extends('userPage.navbar')
    @section('content')
 

<div class="col-md-6 col-lg-3 bigcard" id="search-results">
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
</div>

@endsection
