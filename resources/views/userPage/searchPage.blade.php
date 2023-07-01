@extends('userPage.navbar')
@section('content')

<div class="container text-center my-5 bigContainer" id="bigContainer">
<form method="GET" action="{{route('userPage.getAllUser')}}">
    @csrf
    <button type="submit" class="btn10">اظهر جميع المهنيين</button>
</form>

<form method="GET" action="{{route('userPage.getAllUser')}}">
    @csrf
    <a href="/" class="btn btn-primary">انتقل الى الصفحة الرئيسية</a>

</form>

<form method="GET" action="{{ route('userPage.mysearch') }}">
  @csrf




  <select id="city_name_select" name="city_name">
    <option value="all">Select City</option>
    @foreach($cities as $cityName)
        <option value="{{ $cityName }}">
            {{ $cityName }}
        </option>
    @endforeach</select>

<select id="village_name_select" name="village_name">
    <option value="all">Select Village</option>
</select>


  <div class="select3">
    <div class="row col-3">
      <select class="form-control form-select mt-3" aria-label="Default select example" id="craft_name_select" name="craft_name">
      <option value="all" {{ $selectedCraft == 'all' ? 'selected' : '' }}>All Professions</option>
    @foreach ($crafts as $craft)
        <option value="{{ $craft->id }}" {{ $selectedCraft == $craft->id ? 'selected' : '' }}>
            {{ $craft->craft_name }}
        </option>
    @endforeach
      </select>
    </div>
  </div>

  <div class="row col-3">
  </div>

  <div class="row col-3">
  </div>

  <button type="submit" class="btn10">Search</button>

  <div class="searchN">
    <input class="form-control" type="text" list="datalistOptions" name="Inputsearch" id="Inputsearch" placeholder="Find professional name" />
</div>
  <div id="search_list"></div>
</form>

<section>
  @if($users->count() > 0)
  <div class="container containerBody row g-4 text-center" id="containerBody">
    @foreach($users as $user)
    <div class="col-md-6 col-lg-3" data-role="user">
      <div class="card cardsS bg-light h-100 shadow rounded bg-primary">
        <h3 class="card-title mb-3">{{ $user->fname }}</h3>
        <h3 class="card-title mb-3">{{ $user->all_evl }}</h3>
        <hr>
        <p class="lead card-text">{{ $user->addresses->city_name }} <b> , </b></p>
        <p class="lead card-text">{{ $user->addresses->village_name }} <b> , </b></p>
        <p class="lead card-text" id="craft_name">
          @foreach($user->crafts as $craft)
          {{ $craft->craft_name }} <b> , </b>
          @endforeach
        </p>
        <a href="{{ route('workerPage.showWorker', ['id' => $user->id]) }}" class="btn btn-primary">اضغط للمزيد</a>

      </div>
    </div>
    @endforeach
  </div>

  {{ $users->links() }}

  @else
  <div class="col">
    <div class="alert alert-danger" role="alert">
      No workers
    </div>
  </div>
  @endif
</section>


</div>



@endsection





