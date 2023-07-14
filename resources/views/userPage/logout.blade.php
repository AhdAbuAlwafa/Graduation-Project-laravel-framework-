@extends('userPage.navbar')
@section('content')
<label for="exampleFormControlInput1" class="form-label1">logout done</label>



@endsection

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title> الرئيسيه</title>
    <link href="{{ asset('assets/css/search2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <!----------------navbar------------------->
        @include('shared.navbar')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>

    <!-- Small button groups (default and split) -->
    <form class="form-inline" style="justify-content: center; margin-right: -10px; margin-top: 200px;" method="GET" action="{{ route('userPage.mergeSearchPage') }}">
        @csrf

        <div class="row" style="align-items: center; ">
            <div class="col">
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('userPage.mergeSearchPage') }}">
                    <button type="submit" class="btn btn-lg btn-outline-primary" style="border-width: 0px; background-color: #004985; color: white; ">ابحث</button>
                </form>
            </div>


            <div class="col">
                <div class="btn-group">
                    <select id="craft_name_select" name="craft_name" class="btn btn-secondary btn-lg dropdown-toggle" ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:  #004883; margin-left: 100px;">
                        <option value="all" {{ $selectedCraft == 'all' ? 'selected' : '' }}>جميع المهن</option>
                        @foreach ($crafts as $craft)
                        <option value="{{ $craft->id }}" {{ $selectedCraft == $craft->id ? 'selected' : '' }}>
                            {{ $craft->craft_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="btn-group">
                    <select id="city_name_select" name="city_name" class="btn btn-secondary btn-lg dropdown-toggle" ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:  #004883; margin-left: 100px;">
                        <option value="all">جميع المدن</option>
                        @foreach($cities as $cityName)
                        <option value="{{ $cityName }}">
                            {{ $cityName }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>




            <div class="col">
                <div class="btn-group">
                    <select id="village_name_select" name="village_name" class="btn btn-secondary btn-lg dropdown-toggle" ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:  #004883; margin-left: 100px;">
                        <option value="all">جميع القرى</option>
                    </select>
                </div>
            </div>


    </form>


    <section style="margin-top: 400px;" class="cardsection">
        @if($users->count() > 0)

        <div class="card1">
            <div class="row" style="align-items: center; margin-top: -400px; ;">
                @foreach($users as $user)

                <div class="col">
                    <div class="content">
                        <div class=" card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="assets/img/search-pic.jpg" alt="" />
                                </div>

                                <div class="name-profession">
                                    <span class="name" {{ $user->fname }}</span>
                                        <span class="profession" id="craft_name"> 
                                            @foreach($user->crafts as $craft)
                                            {{ $craft->craft_name }} <b> , </b>
                                            @endforeach
                                        </span>
                                </div>
                                <div class="place">
                                    <span class="city">{{ $user->addresses->city_name }} </span>
                                    <label>/</label>
                                    <span class="village"> {{ $user->addresses->village_name }}</span>
                                </div>

                                <div class="center">

                                    <div class="stars">
                                        <input type="radio" id="one" name="rate" value="1">
                                        <label for="one">{{ $user->all_evl }}</label>
                                        <span class="result"></span>
                                    </div>
                                </div>

                                <div class="a">
                                    <a class="aboutMe" class="btn btn-primary" style="font-size: 20px; " href="{{ route('workerPage.showWorker', ['id' => $user->id]) }}"> انظر صفحه العامل</ش>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#city_name_select').on('change', function() {
                var selectedCity = $(this).val();
                if (selectedCity) {
                    // Send an Ajax request to get the villages based on the selected city
                    $.ajax({
                        url: "{{ route('get-villages') }}",
                        type: "GET",
                        data: {
                            city_name: selectedCity
                        },
                        success: function(data) {
                            console.log(data);
                            // Clear the previous options
                            $('#village_name_select').html('<option value="all">جميع القرى</option>');
                            // Append new options based on the received data
                            $.each(data, function(key, value) {
                                $('#village_name_select').append('<option value="' + value + '">' + value + '</option>');
                            });
                        },

                    });
                } else {
                    // If no city is selected, clear the villages dropdown
                    $('#village_name_select').html('<option value="all">Select Village</option>');
                }
            });
        });
    </script>
</body>








    
<form style="margin-top: -300px ; margin-left: 100px;align-items: center; justify-content: center; width: 900px; ">

    <div class="row" style="align-items: center;  ">
        <div class="col">
            <form class="form-inline my-2 my-lg-0">
                <button type="button" class="btn btn-lg btn-outline-primary"
                    style="border-width: 0px; background-color: #004985; color: white; ">ابحث</button>
            </form>
        </div>
        <div class="col">
            <div class="btn-group">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="background-color:  #004985; margin-left: 100px;">
                    المدينه
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">جنين</a>
                    <a class="dropdown-item" href="#"> نابلس</a>
                    <a class="dropdown-item" href="#"> رام الله</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="btn-group">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"
                    style="background-color:  #004883; margin-left: 100px;">
                    القريه
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">عنزا</a>
                    <a class="dropdown-item" href="#"> عجه</a>
                    <a class="dropdown-item" href="#">السيله</a>
                </div>
            </div>
        </div>
    </div>
</form>