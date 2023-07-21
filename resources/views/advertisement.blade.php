<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>الاعلانات</title>
    <link href="{{ asset('assets/css/advertisement.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>


<body>

    <div>
        <!----------------navbar------------------->
        @include('shared.navbar')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

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

                            $('#village_name_select').html('<option value="all"> جميع القرى</option>');
                            // Append new options based on the received data
                            $.each(data, function(key, value) {
                                $('#village_name_select').append('<option value="' + value.village_name + '">' + value.village_name + '</option>');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <!-- Small button groups (default and split) -->
    <form method="GET" action="{{ route('advertisiment2') }}">
        @csrf
        <div class="container">

            <div class="row" style="align-items: center;  margin-top: 200px; " dir="rtl">

                <div class="col-lg-2 col-md-12 col-12">
                    <div class="btn-group">
                        <select id="craft_name_select" name="craft_name" class="btn btn-secondary btn-lg dropdown-toggle" ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:  #004883; margin-left: 100px;">
                            <option value="all" {{ $selectedCraft == 'all' ? 'selected' : '' }}>جميع المهن</option>
                            @foreach ($crafts as $craft)
                            <option value="{{ $craft->craft_name }}" {{ $selectedCraft == $craft->craft_name ? 'selected' : '' }}>
                                {{ $craft->craft_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-md-12 col-12">
                    <div class="btn-group">
                        <select id="city_name_select" name="city_name" class="btn btn-secondary btn-lg dropdown-toggle" ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:  #004883; margin-left: 100px;">
                            <option value="all">جميع المدن</option>
                            @foreach ($cities as $cityName)
                            <option value="{{ $cityName }}" {{ $selectedCity == $cityName ? 'selected' : '' }}>
                                {{ $cityName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-md-12 col-12">
                    <div class="btn-group">
                        <select id="village_name_select" name="village_name" class="btn btn-secondary btn-lg dropdown-toggle" ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:  #004883; margin-left: 100px;">
                            <option value="all">جميع القرى </option>
                        </select>
                    </div>
                </div>


                @if($user->is_worker ==1)
                <div class="col-lg-2 col-md-12 col-12">
                    <div class="btn-group">
                        <select id="advertisement_type" name="advertisement_type" class="btn btn-secondary btn-lg dropdown-toggle" ata-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:  #004883; margin-left: 100px;">
                            <option value="all">جميع الاعلانات</option>
                            <option value="workshops" {{ $selectedType == 'workshops' ? 'selected' : '' }}>اعلانات ورشات العمل</option>
                            <option value="workAlone" {{ $selectedType == 'workAlone' ? 'selected' : '' }}> اعلانات العمل الحر</option>
                        </select>
                    </div>
                </div>
                @endif
                <div class="col-lg-2 col-md-12 col-12">
                    <form class="form-inline my-2 my-lg-0">
                        <button type="submit" class="btn btn-lg btn-outline-primary" style="border-width: 0px; background-color: #004985; color: white;  width: 110px; margin-right: 100px; ">ابحث</button>
                    </form>
                </div>

            </div>
        </div>
    </form>
    <!------------------------------------- dropppdown----------------------->

    <!----------------------------------------------------------------------->
    <div class="container">
        <div class="row" style="align-items: center; margin-top: 50px; ;">
            @if ($advertisements->count() > 0)
            @foreach ($advertisements as $ad)
            <div class="col-lg-4 col-md-12 col-12" style="margin-bottom: 30px;">

                <div class="card">
                    <section class="main">
                        <p class="name">{{ $ad->users->fname }} {{ $ad->users->lname }}</p>
                        <p>{{ $ad->job_des }}</p>
                        <p>{{ $ad->adv_req }}</p>
                        <p>{{ $ad->advertisement_type }}</p>



                    </section>

                    <section class="more">
                        <p> ..اعرف المزيد عني</p>
                        <div class="moreinfo">
                            <a class="craft">
                                <label for=""><label for="">{{$ad->job_name}}</label>
                                </label>

                            </a>
                            <a class="city">
                                <label for=""><label for="">{{ $ad->addresses ? $ad->addresses->city_name : 'N/A' }}</label></label>
                            </a>
                            <a class="village">
                                <label for=""><label for="">{{ $ad->addresses ? $ad->addresses->village_name : 'N/A' }}</label></label>
                            </a>
                        </div>

                    </section>

                    <section class="info">
                        <section>
                            <p>اضغط الرمز اعلاه لمعرفه المزيد</p>

                        </section>
                        <button id="openerBtn">
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-minus"></i>
                        </button>
                    </section>
                </div>
            </div>
            @endforeach
            {{ $advertisements->links()}}
            @else
            <p>No advertisements found.</p>
            @endif




        </div>
    </div>
    <!------------------------>
    <!----------------------------------->
</body>

<script>
    var buttonEl = document.getElementById('openerBtn');
    var cardEl = document.querySelector('.card');

    buttonEl.addEventListener('click', function() {
        cardEl.classList.toggle('opened');
    })
</script>



</html>