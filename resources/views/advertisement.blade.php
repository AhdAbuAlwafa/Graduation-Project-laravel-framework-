<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
    <div class="container">

        <div class="row" style="align-items: center;  margin-top: 200px; " dir="rtl">

            <div class="col-lg-2 col-md-12 col-12" >
                <div class="btn-group" >
                    <button class="btn btn-secondary btn-lg dropdown-toggle"  type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        style="background-color:  #004985;  margin-left: 10px;  width: 170px;">
                        المدينة
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">جنين</a>
                        <a class="dropdown-item" href="#"> نابلس</a>
                        <a class="dropdown-item" href="#"> رام الله</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-12 col-12">
                <div class="btn-group">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        style="background-color:  #004883; margin-left: 10px;  width: 170px;">
                        القرية
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">عنزا</a>
                        <a class="dropdown-item" href="#"> عجه</a>
                        <a class="dropdown-item" href="#">السيله</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-12 col-12">
                <div class="btn-group">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        style="background-color:  #004883; margin-left: 10px;  width: 170px;">
                        المهن
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">مهندس</a>
                        <a class="dropdown-item" href="#">نجار</a>
                        <a class="dropdown-item" href="#">حداد</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-12 col-12">
                <div class="btn-group">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        style="background-color:  #004883; margin-left: 10px; width: 170px;">
                        نوع الاعلان
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">اعلانات عمال</a>
                        <a class="dropdown-item" href="#">عمل حر</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-12 col-12">
                <form class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-lg btn-outline-primary"
                        style="border-width: 0px; background-color: #004985; color: white;  width: 110px; margin-right: 100px; ">ابحث</button>
                </form>
            </div>

        </div>
    </div>

    <!------------------------------------- dropppdown----------------------->

    <!----------------------------------------------------------------------->
    <div class="container">
        <div class="row" style="align-items: center; margin-top: 50px; ;">
            <div class="col-lg-4 col-md-12 col-12" style="margin-bottom: 30px;">
                <div class="card">
                    <section class="main">
                        <p class="name">صائب صلاح</p>
                        <p>يلزم عامل مساعد لي في العمار للعمل صباحا حتى الساعه السادسه</p>
                    </section>

                    <section class="more">
                        <p> ..اعرف المزيد عني</p>
                        <div class="moreinfo">
                            <a class="craft">
                                <label for="">دهان</label>
                            </a>
                            <a class="city">
                                <label for="">جنين</label>
                            </a>
                            <a class="village">
                                <label for="">فقوعه</label>
                            </a>
                        </div>
                        <div class="moreinfo2">
                            <a class="phonenum">
                                <label for="">رقم الهاتف : </label>
                                <label for="">0599723795</label>
                            </a>
                            <a class="addvdate">
                                <label for=""> تاريخ انتهاء الاعلان : </label>
                                <label for="">1\7\2023</label>
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

            <div class="col-lg-4 col-md-12 col-12" style="margin-bottom: 30px;">
                <div class="card">
                    <section class="main">
                        <p class="name">صائب صلاح</p>
                        <p>يلزم عامل مساعد لي في العمار للعمل صباحا حتى الساعه السادسه</p>
                    </section>

                    <section class="more">
                        <p> ..اعرف المزيد عني</p>
                        <div class="moreinfo">
                            <a class="craft">
                                <label for="">دهان</label>
                            </a>
                            <a class="city">
                                <label for="">جنين</label>
                            </a>
                            <a class="village">
                                <label for="">فقوعه</label>
                            </a>
                        </div>
                        <div class="moreinfo2">
                            <a class="phonenum">
                                <label for="">رقم الهاتف : </label>
                                <label for="">0599723795</label>
                            </a>
                            <a class="addvdate">
                                <label for=""> تاريخ انتهاء الاعلان : </label>
                                <label for="">1\7\2023</label>
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

        </div>
    </div>
    <!------------------------>
    <!----------------------------------->
</body>

<script>
    var buttonEl = document.getElementById('openerBtn');
    var cardEl = document.querySelector('.card');

    buttonEl.addEventListener('click', function () {
        cardEl.classList.toggle('opened');
    })
</script>



</html>