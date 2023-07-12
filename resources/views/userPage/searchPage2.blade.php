<!DOCTYPE html>
<html lang="ar">

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


    <section style="margin-top: 400px;" class="cardsection">
        <div class="card1">
            <div class="row" style="align-items: center; margin-top: -400px; ;">
                <div class="col">
                    <div class="content">
                        <div class=" card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="assets/img/search-pic.jpg" alt="" />
                                </div>


                                <div class="name-profession">
                                    <span class="name">احمد برهم</span>
                                    <span class="profession"> حداد</span>
                                </div>
                                <div class="place">
                                    <span class="city">جنين </span>
                                    <label>/</label>
                                    <span class="village"> عنزا</span>
                                </div>

                                <div class="center">

                                    <div class="stars">
                                        <input type="radio" id="one" name="rate" value="1">
                                        <label for="one">2.4</label>
                                        <span class="result"></span>
                                    </div>
                                </div>

                                <div class="button">
                                    <button class="aboutMe" style="font-size: 20px; "> انظر صفحه العامل</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>