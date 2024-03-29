<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title> الرئيسيه</title>
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
    <!-----bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- ===== Link Swiper's CSS for carousal ===== -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <!-------bootstrap-->
    <!-- Keep only one instance of jQuery, load it before your custom script -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl-js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-DWllpPHujNak1yadQKk5tN6+m4fASERcBr1JPB1b3a+w4YNfLInR39q6Q8TnZtULPST/dFw2H9ktWZddg18hg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





    <script>
        $(document).ready(function() {
            $('#city_name_select1').on('change', function() {
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
                            $('#village_name_select1').html(
                                '<option value="all">جميع القرى </option>');
                            // Append new options based on the received data
                            $.each(data, function(key, value) {

                                $('#village_name_select1').append('<option value="' +
                                    value.id + '">' + value.village_name +
                                    '</option>');
                            });
                        },

                    });
                } else {
                    // If no city is selected, clear the villages dropdown
                    $('#village_name_select1').html('<option value="all">جميع القرى </option>');
                }
            });
        });
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
                            $('#village_name_select').html(
                                '<option value="all">جميع القرى </option>');
                            // Append new options based on the received data
                            $.each(data, function(key, value) {

                                $('#village_name_select').append('<option value="' +
                                    value.id + '">' + value.village_name +
                                    '</option>');
                            });
                        },

                    });
                } else {
                    // If no city is selected, clear the villages dropdown
                    $('#village_name_select').html('<option value="all">جميع القرى </option>');
                }
            });
        });
    </script>

    <!-----------------coursal------------------>

    <div class="carousel slide" style="width: 100%;" data-bs-ride="carousel" id="carouselExampleIndicators">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="..." class="d-block w-100" src="assets/img/bghome.webp">
                <div class="carousel-caption">
                    <h5>ابحث عن افضل العمال في منطقتك </h5>
                    <p style="font-size: 23px;  width: 60%; margin: auto; line-height: 1.9;">قيم العمال وتصفح التعليقات
                        على صفحاتهم الشخصيه واختر افضل العمال باقل وقت واقل جهد</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="assets/img/bghome3.jpg">
                <div class="carousel-caption">
                    <h5>ابحث عن افضل العمال في منطقتك </h5>
                    <p style="font-size: 23px;  width: 60%; margin: auto; line-height: 1.9;">قيم العمال وتصفح التعليقات
                        على صفحاتهم الشخصيه واختر افضل العمال باقل وقت واقل جهد</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="assets\img\bghome2.jpeg">
                <div class="carousel-caption">
                    <h5>ابحث عن افضل العمال في منطقتك </h5>
                    <p style="font-size: 23px;  width: 60%; margin: auto; line-height: 1.9;">قيم العمال وتصفح التعليقات
                        على صفحاتهم الشخصيه واختر افضل العمال باقل وقت واقل جهد</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="up-page">
            <!-----------------search----------------->
            <div class="searchbox1">
                <div class="searchbox2">
                    <form action="/users/search" method="GET">
                        <input type="text" name="search" placeholder="ابحث عن عامل">
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa fa-magnifying-glass"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <!----------------navbar------------------->
        @include('shared.navbar')


        <!---------------------start of crafts --------------->
        <section class="services section-padding" id="services">

            <div class="crafts">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header text-center pb-5">
                                <h2 style="font-size: 50px;">المهن</h2>
                                <p style="font-size: 28px;">اختر المهنه لتتصفح قائمه امهر العمال</p>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($crafts as $craft)
                    <div class="contener">
                        <div class="img-contener">

                            <img src="{{ asset('/images/' . $craft->image_path) }}">
                        </div>
                        <br>
                        <br>
                        <div class="btn-contener">

                            <a href="{{ route('userPage.getAllUser', ['profession' => $craft->id]) }}"
                                class="btn btn-primary">{{ $craft->craft_name }} </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        @if ($user->is_worker == 1)

            <!-----------------coursal for addv------------------------>
            <div class="row">

                <div class="col-lg-2 col-md-12 col-12" style="margin-left: 100px; margin-top: 40px;">
                    <form class="form-inline my-2 my-lg-0">
                        <a href="{{ route('advertisiment2', ['advertisement_type' => 'workshops']) }}"
                            class="btn btn-lg btn-outline-primary"
                            style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">
                            جميع الاعلانات</a>
                    </form>
                </div>


                <div class="col-lg-2 col-md-12 col-12" style="margin-top: 40px;">
                    <form class="form-inline my-2 my-lg-0" id="advertisementForm">
                        @method('post')
                        {{ csrf_field() }}
                        <a href="#" data-bs-toggle="modal" data-bs-target="#advertisiment-modal1"
                            onclick="submitForm('workshops')" class="btn btn-lg btn-outline-primary"
                            style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">
                            اضف اعلان</a>
                    </form>
                </div>


                <div class="modal" tabindex="-1" id="advertisiment-modal1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">إضافة اعلان ورشات عمل </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('workerPage.store') }}" method="post"
                                    id="advertisementFormSubmit">
                                    @csrf
                                    {{ csrf_field() }}


                                    <div id="shop-errors">

                                    </div>

                                    <input type="hidden" name="advertisement_type" value="workshops ">

                                    <div class="row" dir="rtl">
                                        <div class="col">
                                            <select class="form-control8 form-select mt-3  justify-content-end"
                                                aria-label="Default select example" name="adv_period">

                                                <option selected value="">اختر مدة الاعلان</option>
                                                <option value="1">يوم</option>
                                                <option value="2">يومان</option>
                                                <option value="3">ثلاثة ايام</option>
                                                <option value="4">اربعة ايام</option>
                                                <option value="5">خمسة ايام</option>
                                                <option value="6">ستة ايام</option>
                                                <option value="7">سبعة ايام</option>
                                            </select>
                                            @error('adv_period')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="select1">

                                                <select class="form-control8 form-select mt-3"
                                                    aria-label="Default select example" name="job_name">
                                                    <option selected value="">اختر المهنة المطلوبة</option>
                                                    @foreach ($crafts as $craft)
                                                        <option value="{{ $craft->craft_name }}">
                                                            {{ $craft->craft_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('job_name')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row" dir="rtl">
                                        <div class="col">

                                            <select class="form-control8 form-select mt-3 "
                                                aria-label="Default select example" id="village_name_select"
                                                name="address_id">
                                                <option selected value="">اخترالقرية/البلدة</option>

                                            </select>

                                        </div>
                                        <div class="col">
                                            <select class="form-control8 form-select mt-3"
                                                aria-label="Default select example" id="city_name_select"
                                                name="city_name">
                                                <option selected value="">اختر المدينة</option>
                                                @foreach ($cities as $cityName)
                                                    <option value="{{ $cityName }}">
                                                        {{ $cityName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('city_name')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row" dir="rtl">
                                        <div class="col">
                                            <select class="form-control8 form-select mt-3  justify-content-end"
                                                aria-label="Default select example" name="work_hour">

                                                <option selected value="">عدد ساعات العمل</option>
                                                <option value="8">8</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="14">14</option>
                                                <option value="12">12</option>
                                                <option value="6">6</option>
                                            </select>

                                            @error('work_hour')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row" dir="rtl">
                                        <div class="col">
                                            <textarea class="form-control8" id="IP" cols="45" rows="2" name="job_des"
                                                placeholder="وصف الوظيفة"></textarea>
                                            @error('job_des')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <textarea class="form-control8" id="IP" cols="45" rows="2" name="adv_req"
                                                placeholder="متطلبات الوظيفة"></textarea>
                                            @error('adv_req')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">غير محدد </label>
                                        <input class="form-check-input" type="radio" name="work_period"
                                            id="IR3" value="غير محدد">

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">نهارية وليلية </label>
                                        <input class="form-check-input" type="radio" name="work_period"
                                            id="IR4" value="نهارية وليلية">

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">ليلية </label>
                                        <input class="form-check-input" type="radio" name="work_period"
                                            id="IR5" value="ليلية">

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">نهارية </label>
                                        <input class="form-check-input" type="radio" name="work_period"
                                            id="IR6" value="نهارية">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">الفتره</label>
                                    </div>
                                    <div class="t-work">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="IR1" value="ذكر">
                                            <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="inlineRadio1">انثى </label>
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="IR2" value="انثى">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="inlineRadio1">جنس المهني</label>

                                        </div>






                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-secondary">انشر</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-7 col-md-12 col-12">
                    <div class="section-header text-center pb-5">
                        <h2 style="font-size: 50px;">اعلانات العمال</h2>
                        <p style="font-size: 28px;">تصفح اعلانات العمال واحصل على فرص عمل اكثر</p>
                    </div>
                </div>

            </div>
            <section style="  position: relative;
        height: 550px;
        align-items: center;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="swiper mySwiper container">
                            <div class="swiper-wrapper content">


                                @foreach ($workshopAds as $ad)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <section class="main">
                                                <p class="name">{{ $ad->users->fname }} {{ $ad->users->lname }}</p>
                                                <p class="job_des">{{ $ad->job_des }}</p>
                                                <p class="job_des">{{ $ad->adv_req }}</p>

                                            </section>

                                            <section class="more">
                                                <p> ..اعرف المزيد عني</p>
                                                <div class="moreinfo">
                                                    <a class="craft">
                                                        <label for="">{{ $ad->job_name }}</label>
                                                    </a>
                                                    <a class="city">
                                                        <label
                                                            for="">{{ optional($ad->addresses)->city_name }}</label>
                                                    </a>
                                                    <a class="village">
                                                        <label
                                                            for="">{{ optional($ad->addresses)->village_name }}</label>
                                                    </a>
                                                </div>
                                                <div class="moreinfo2">
                                                    <div class="info-wrapper">
                                                        <a class="phonenum">
                                                            <label for="">{{ $ad->users->number }}</label>
                                                            <label for="">:الرقم  </label>
                                                        </a>
                                                        <a class="addvdate">
                                                            <label for="">{{ date('Y-m-d', strtotime($ad->expires_at)) }}</label>
                                                            <label for=""> : تاريخ انتهاء الإعلان </label>
                                                        </a>
                                                        <a class="period">
                                                            <label for="">{{ $ad->work_period }}</label>
                                                            <label for="">: الفترة </label>
                                                        </a>
                                                        <a class="gender">
                                                            <label for=""> 
                                                                @if ($ad->users->gender == 0)
                                                                    ذكر
                                                                @elseif ($ad->users->gender == 1)
                                                                    أنثى
                                                                @endif
                                                            </label>
                                                            <label for="">: الجنس</label>
                                                        </a>
                                                        <a class="hour">
                                                            <label for="">{{ $ad->work_hour }}</label>
                                                            <label for=""> : عدد ساعات العمل</label>
                                                        </a>
                                                    </div>
                                                </div>
                                            </section>

                                            <section class="info">
                                                <section>
                                                    <p>اضغط الرمز اعلاه لمعرفه المزيد</p>

                                                </section>
                                                <button id="openerBtn" class="openerBtn">
                                                    <i class="fas fa-plus"></i>
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </section>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>

            </section>
            <!-- Swiper JS -->
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    slidesPerGroup: 3,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            </script>

        @endif
        <script>
            $(function() {
                $('#advertisementFormSubmit').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: new FormData(this),
                        processData: false,
                        dataType: 'json',
                        contentType: false,

                        success: function(data) {
                            if (data.status == 0) {
                                //  $(document).find('.error-text').text('');
                                const list = document.getElementById("shop-errors");

                                while (list.hasChildNodes()) {
                                    list.removeChild(list.firstChild);
                                }

                                $.each(data.error, function(prefix, val) {
                                    //  $('span.' + prefix + '_error').text(val[0]).removeAttr('hidden');

                                    errorSec = document.getElementById('shop-errors');
                                    prefix = document.createElement("p");
                                    prefix.innerText = val[0];
                                    errorSec.appendChild(prefix)


                                });

                            } else if (data.status == 2) {
                                Swal.fire({
                                    title: 'warning',
                                    text: 'You have reached the maximum number of allowed downloads for this month',
                                    icon: 'warning',
                                    confirmButtonText: 'OK'
                                });

                            } else if (data.status == 3) {
                                Swal.fire({
                                    title: 'warning',
                                    text: ' you have reached the maximum number of allowed ads',
                                    icon: 'warning',
                                    confirmButtonText: 'OK'
                                });

                            } else {
                                const list = document.getElementById("shop-errors");

                                while (list.hasChildNodes()) {
                                    list.removeChild(list.firstChild);
                                }


                                $('#advertisementFormSubmit').trigger('reset');
                                Swal.fire({
                                    title: 'success',
                                    text: 'تم اضافه الاعلان بنجاح',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    })
                })
            })
        </script>

        <!---------------second part of adv------------>
        <div class="row" style="margin-top: 200px;">


            <div class="col-lg-2 col-md-12 col-12" style="margin-left: 100px; margin-top: 40px;">
                <form class="form-inline my-2 my-lg-0" id="advertisementForm">
                    @method('post')
                    {{ csrf_field() }}
                    <a href="#" data-bs-toggle="modal" data-bs-target="#advertisiment-modal"
                        onclick="submitForm('workAlone')" class="btn btn-lg btn-outline-primary"
                        style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">اضف
                        اعلان</a>
                </form>
            </div>


            <div class="col-lg-2 col-md-12 col-12" style="margin-top: 40px;">
                <form class="form-inline my-2 my-lg-0">
                    <a href="{{ route('advertisiment2', ['advertisement_type' => 'workAlone']) }}"
                        class="btn btn-lg btn-outline-primary"
                        style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">جميع
                        الاعلانات</a>
                </form>
            </div>


            <div class="col-lg-7 col-md-12 col-12">
                <div class="section-header text-center pb-5">
                    <h2 style="font-size: 50px;">اعلانات العمل الحر</h2>
                    <p style="font-size: 28px;">تصفح اعلانات العمل الحر واحصل على فرص عمل اكثر</p>
                </div>
            </div>
            <span id="errors" class="error-text adv_period_error"></span>
            <span id="errors" class="error-text job_name_error"></span>
            <span id="errors" class="error-text village_name_error"></span>
            <span id="errors" class="error-text city_name_error"></span>
            <span id="errors" class="error-text job_des_error"></span>

            <div class="modal" tabindex="-1" id="advertisiment-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">إضافة اعلان عمل حر</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('workerPage.store') }}" method="post"
                                id="advertisementFormSubmit2">

                                @method('post')
                                {{ csrf_field() }}
                                <div id="free-errors">

                                </div>
                                <input type="hidden" name="advertisement_type" value="workAlone">

                                <div class="row" dir="rtl">
                                    <div class="col">
                                        <select class="form-control8 form-select mt-3  justify-content-end"
                                            aria-label="Default select example" name="adv_period">

                                            <option selected value="" selected Disabled>اختر مدة الاعلان</option>
                                            <option value="1">يوم</option>
                                            <option value="2">يومان</option>
                                            <option value="3 ">ثلاثة ايام</option>
                                            <option value="4 ">اربعة ايام</option>
                                            <option value="5 ">خمسة ايام</option>
                                            <option value="6 ">ستة ايام</option>
                                            <option value="7">سبعة ايام</option>
                                        </select>
                                        @error('adv_period')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="col">
                                        <div class="select1">

                                            <select class="form-control8 form-select mt-3"
                                                aria-label="Default select example" name="job_name">
                                                <option selected value="">اختر المهنة المطلوبة</option>
                                                @foreach ($crafts as $craft)
                                                    <option value="{{ $craft->craft_name }}">{{ $craft->craft_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        @error('job_name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" dir="rtl">
                                    <div class="col">
                                        <select class="form-control8 form-select mt-3 "
                                            aria-label="Default select example" id="village_name_select1"
                                            name="address_id">
                                            <option value="" selected>اخترالقرية/البلدة</option>

                                        </select>
                                        @error('village_name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <select class="form-control8 form-select mt-3"
                                            aria-label="Default select example" id="city_name_select1"
                                            name="city_name">
                                            <option value="" selected>اختر المدينة</option>
                                            @foreach ($cities as $cityName)
                                                <option value="{{ $cityName }}">
                                                    {{ $cityName }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('city_name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" dir="rtl">
                                    <div class="col">
                                        <textarea class="form-control8" id="IP" cols="45" rows="2" name="job_des"
                                            placeholder="وصف الوظيفة"></textarea>
                                        @error('job_des')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">غير محدد </label>
                                    <input class="form-check-input" type="radio" name="work_period" id="IR3"
                                        value="غير محدد">

                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">نهارية وليلية </label>
                                    <input class="form-check-input" type="radio" name="work_period" id="IR4"
                                        value="نهارية وليلية">

                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">ليلية </label>
                                    <input class="form-check-input" type="radio" name="work_period" id="IR5"
                                        value="ليلية">

                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">نهارية </label>
                                    <input class="form-check-input" type="radio" name="work_period" id="IR6"
                                        value="نهارية">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">الفتره</label>
                                </div>
                                <div class="t-work">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="IR1"
                                            value="ذكر">
                                        <label class="form-check-label" for="inlineRadio1">ذكر</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">انثى </label>
                                        <input class="form-check-input" type="radio" name="gender" id="IR2"
                                            value="انثى">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">جنس المهني</label>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">الغاء</button>
                                    <button type="submit" class="btn btn-secondary">انشر</button>
                                </div>
                            </form>

                            <div id="messageModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <p id="messageText"></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section
            style="  position: relative;
        height: 450px; margin-bottom: 200px;
        align-items: center; ">

            <div class="row">
                <div class="col-md-12">
                    <div class="swiper mySwiper container">
                        <div class="swiper-wrapper content">


                            @foreach ($workAloneAds as $ad)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <section class="main">
                                            <p class="name">{{ $ad->users->fname }} {{ $ad->users->lname }}</p>
                                            <p class="job_des">{{ $ad->job_des }}</p>
                                            <p class="job_des">{{ $ad->adv_req }}</p>

                                        </section>

                                        <section class="more">
                                            <p> ..اعرف المزيد عني</p>
                                            <div class="moreinfo">
                                                <a class="craft">
                                                    <label for="">{{ $ad->job_name }}</label>
                                                </a>
                                                <a class="city">
                                                    <label
                                                        for="">{{ optional($ad->addresses)->city_name }}</label>
                                                </a>
                                                <a class="village">
                                                    <label
                                                        for="">{{ optional($ad->addresses)->_name }}</label>
                                                </a>
                                            </div>
                                            
                                            <div class="moreinfo2">
                                                <div class="info-wrapper">
                                                    <a class="phonenum">
                                                        <label for="">{{ $ad->users->number }}</label>
                                                        <label for="">:الرقم  </label>
                                                    </a>
                                                    <a class="addvdate">
                                                        <label for="">{{ date('Y-m-d', strtotime($ad->expires_at)) }}</label>
                                                        <label for=""> : تاريخ انتهاء الإعلان </label>
                                                    </a>
                                                    <a class="period">
                                                        <label for="">{{ $ad->work_period }}</label>
                                                        <label for="">: الفترة </label>
                                                    </a>
                                                    <a class="gender">
                                                        <label for=""> 
                                                            @if ($ad->users->gender == 0)
                                                                ذكر
                                                            @elseif ($ad->users->gender == 1)
                                                                أنثى
                                                            @endif
                                                        </label>
                                                        <label for="">: الجنس</label>
                                                    </a>
                                                    <a class="hour">
                                                        <label for="">{{ $ad->work_hour }}</label>
                                                        <label for=""> : عدد ساعات العمل</label>
                                                    </a>
                                                </div>
                                            </div>
                                        </section>

                                        <section class="info">
                                            <section>
                                                <p>اضغط الرمز اعلاه لمعرفه المزيد</p>

                                            </section>
                                            <button id="openerBtn" class="openerBtn">
                                                <i class="fas fa-plus"></i>
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </section>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

        </section>
    </div>





    <script>
        $(function() {
            $('#advertisementFormSubmit2').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,

                    success: function(data) {
                        if (data.status == 0) {
                            const list = document.getElementById("free-errors");

                            while (list.hasChildNodes()) {
                                list.removeChild(list.firstChild);
                            }

                            $.each(data.error, function(prefix, val) {
                                errorSec = document.getElementById('free-errors');
                                prefix = document.createElement("p");
                                prefix.innerText = val[0];
                                errorSec.appendChild(prefix)

                            });

                        } else if (data.status == 2) {
                            Swal.fire({
                                title: 'warning',
                                text: 'You have reached the maximum number of allowed downloads for this month',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });

                        } else if (data.status == 3) {
                            Swal.fire({
                                title: 'warning',
                                text: ' you have reached the maximum number of allowed ads',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });

                        } else {
                            const list = document.getElementById("free-errors");

                            while (list.hasChildNodes()) {
                                list.removeChild(list.firstChild);
                            }
                            $('#advertisementFormSubmit2').trigger('reset');
                            Swal.fire({
                                title: 'success',
                                text: 'تم اضافه الاعلان بنجاح',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                })
            })
        })
    </script>




    <script>
        $(document).ready(function() {
            $('#advertisementForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('workerPage.store') }}',
                    data: formData,
                    success: function(response) {

                        $('#messageText').text(response.message);
                        $('#messageModal').modal('show');
                    },
                    error: function(xhr, status, error) {

                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        function submitForm(advertisementType) {
            $('input[name="advertisement_type"]').val(advertisementType);

            $('#advertisementForm').submit();
        }
    </script>


    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        var buttonEls = document.querySelectorAll('.openerBtn');
        var cardEls = document.querySelectorAll('.card');

        for (let i = 0; buttonEls.length; i++) {
            buttonEls[i].addEventListener('click', function() {
                cardEls[i].classList.toggle('opened');

            })
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#Inputsearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();

                $('div[data-role="user"]').each(function() {
                    var userName = $(this).find('h3').text().toLowerCase();
                    if (userName.indexOf(value) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>



</body>

</html>
<style>
    #shop-errors p {
        margin-bottom: 0px;
        color: red;
        direction: rtl
    }

    #free-errors p {
        margin-bottom: 0px;
        color: red;
        direction: rtl
    }
</style>
