<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title> الرئيسيه</title>
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="up-page">
            <!----------------navbar------------------->
            @include('shared.navbar')

            <!----------------content of pic-------------->
            <h2 class="content-pic1"> ابحث عن افضل العمال من كافة المهن لانجاز اعمالك</h2>
            <h3 class="content-pic2">هل تعرف اسم المهني ؟ قم بالبحث عنه </h3>
            <!-----------------search on pic----------------->
            <div class="searchbox1">
                <div class="searchbox2">
                    <input type='text' placeholder="ابحث عن عامل">
                    <a href="#">
                        <i class="fa fa-magnifying-glass"></i>
                    </a>
                </div>
            </div>
        </div>
        <!--------------- bottom-page---------------->
        <!---------------------start of crafts --------------->
        <div class="crafts">
            <div class="center1">
                <h1>مهن فلسطين</h1>
            </div>

            @foreach ($crafts as $craft)
            <div class="contener">
                <div class="img-contener">
                    <img src="assets/img/pic1.jpg">
                </div>
                <br>
                <br>
                <div class="btn-contener">
                    <a href="#" class="btn">{{ $craft }}</a>
                </div>
            </div>
            @endforeach
        </div>

        <!------------------------start of adds-------------------->
        <div class="adds">
            <div class="center2">
                <h1>الاعلانات</h1>
            </div>
        </div>
        <br><br><br>
        <!------------------------adss of free work---------------->
        <div class="adds1">
            <h1>اعلانات العمل الحر</h1>
        </div>
        <div class="select-box">
            <div class="select-option1">
                <input type="text" placeholder="المدينه" id="soValue1" readonly name="">
            </div>
            <div class="content1">
                <ul class="options1">
                    <li>جنين</li>
                    <li>نابلس</li>
                    <li>رام الله</li>
                    <li>بيت لحم</li>
                    <li>الخليل</li>
                    <li>طولكرم </li>
                </ul>
            </div>

        </div>
        <div class="select-box">
            <div class="select-option2">
                <input type="text" placeholder="القريه" id="soValue2" readonly name="">
            </div>
            <div class="content2">
                <ul class="options2">
                    <li>جنين</li>
                    <li>نابلس</li>
                    <li>رام الله</li>
                    <li>بيت لحم</li>
                    <li>الخليل</li>
                    <li>طولكرم </li>
                </ul>
            </div>
        </div>
        <br>

        <br><br><br> <br><br><br> <br><br><br>

    </div>
</body>