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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- ===== Link Swiper's CSS for carousal ===== -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>

<body>
    <!-------bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
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
                <div class="searchbox2" dir="rtl">
                    <form action="/users/search" method="GET">

                    <input type='text'name="search" placeholder="ابحث عن عامل " style="color: black;">
                    <a href="#"onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-magnifying-glass" style="font-size: 30px; color: rgb(38, 0, 255); "></i>
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

                        <img src="{{asset('/images/'.$craft->image_path)}}">
                    </div>
                    <br>
                    <br>
                    <div class="btn-contener">

                        <a href="{{ route('userPage.getAllUser', ['profession' => $craft->id]) }}" class="btn btn-primary">{{ $craft->craft_name }} </a>

                    </div>
                </div>
                @endforeach
            </div>
        </section>

@if($user->is_worker ==1)

        <!-----------------coursal for addv------------------------>
        <div class="row" >

            <div class="col-lg-2 col-md-12 col-12" style="margin-left: 100px; margin-top: 40px;">
                <form class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-lg btn-outline-primary"
                        style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">اضف اعلان</button>
                </form>
            </div>

            <div class="col-lg-2 col-md-12 col-12" style="margin-top: 40px;">
                <form class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-lg btn-outline-primary"
                        style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">جميع الاعلانات</button>
                </form>
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


                        @foreach($workshopAds as $ad)
                            <div class="swiper-slide">
                                <div class="card">
                                    <section class="main">
                                    <p class="name">{{ $ad->users->fname }} {{ $ad->users->lname }}</p>
                                        <p>{{ $ad->job_des }}</p>
                                        <p>{{ $ad->adv_req }}</p>

                                    </section>

                                    <section class="more">
                                        <p> ..اعرف المزيد عني</p>
                                        <div class="moreinfo">
                                            <a class="craft">
                                                <label for="">{{ $ad->job_name }}</label>
                                            </a>
                                            <a class="city">
                                                <label for="">{{ optional($ad->addresses)->city_name }}</label>
                                            </a>
                                            <a class="village">
                                                <label for="">{{ optional($ad->addresses)->village_name }}</label>
                                            </a>
                                        </div>
                                        <div class="moreinfo2">
                                            <a class="phonenum">
                                                <label for="">رقم الهاتف : </label>
                                                <label for="">{{ $ad->users->number }}</label>
                                            </a>
                                            <a class="addvdate">
                                                <label for=""> تاريخ انتهاء الاعلان : </label>
                                                <label for=""> {{ $ad->expires_at }}</label>
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
        <!---------------second part of adv------------>
        <div class="row" style="margin-top: 200px;">

            <div class="col-lg-2 col-md-12 col-12" style="margin-left: 100px; margin-top: 40px;">
                <form class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-lg btn-outline-primary"
                        style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">اضف اعلان</button>
                </form>
            </div>

            <div class="col-lg-2 col-md-12 col-12" style="margin-top: 40px;">
                <form class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-lg btn-outline-primary"
                        style="box-shadow: 0 0 32px rgba(0, 0, 0, 0.5) ;border-radius: 20px; background-color: #a3c5d6; color: rgb(0, 0, 0); ">جميع الاعلانات</button>
                </form>
            </div>

            <div class="col-lg-7 col-md-12 col-12">
                <div class="section-header text-center pb-5">
                    <h2 style="font-size: 50px;">اعلانات العمل الحر</h2>
                    <p style="font-size: 28px;">تصفح اعلانات العمل الحر واحصل على فرص عمل اكثر</p>
                </div>
            </div>
        </div>

        <section style="  position: relative;  
        height: 450px; margin-bottom: 200px;
        align-items: center; ">

            <div class="row">
                <div class="col-md-12">
                    <div class="swiper mySwiper container">
                        <div class="swiper-wrapper content">


                        @foreach($workAloneAds as $ad)
                            <div class="swiper-slide">
                                <div class="card">
                                    <section class="main">
                                    <p class="name">{{ $ad->users->fname }} {{ $ad->users->lname }}</p>
                                        <p>{{ $ad->job_des }}</p>
                                        <p>{{ $ad->adv_req }}</p>

                                    </section>

                                    <section class="more">
                                        <p> ..اعرف المزيد عني</p>
                                        <div class="moreinfo">
                                            <a class="craft">
                                                <label for="">{{ $ad->job_name }}</label>
                                            </a>
                                            <a class="city">
                                                <label for="">{{ optional($ad->addresses)->city_name }}</label>
                                            </a>
                                            <a class="village">
                                                <label for="">{{ optional($ad->addresses)->village_name }}</label>
                                            </a>
                                        </div>
                                        <div class="moreinfo2">
                                            <a class="phonenum">
                                                <label for="">رقم الهاتف : </label>
                                                <label for="">{{ $ad->users->number }}</label>
                                            </a>
                                            <a class="addvdate">
                                                <label for=""> تاريخ انتهاء الاعلان : </label>
                                                <label for=""> {{ $ad->expires_at }}</label>
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
    </div>

    <script>
        var buttonEl = document.getElementById('openerBtn');
        var cardEl = document.querySelector('.card');

        buttonEl.addEventListener('click', function() {
            cardEl.classList.toggle('opened');
        })
    </script>
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