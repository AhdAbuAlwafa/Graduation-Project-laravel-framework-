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

        <!------------------------start of adds-------------------->
        <div class="adds">
            <div class="center2">
                <h1>اعلانات البحث عن مهني</h1>

            </div>
        </div>
        <br><br><br>
        <!------------------------adss of free work---------------->
        <div class="adds1">
            <div class="center3">
                <h1>اعلانات البحث عن مهني</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="adds-selection1">
                    <div class="adds-selection2">
                        <select class='adds-selection2' id="city" name="city" ] style="color: #4e4e4e;">
                        </select>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="adds-selection1">
                    <div class="adds-selection2">
                        <select class='adds-selection2' id="village" name="village" ] style="color: #4e4e4e;">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="adds-selection1">
                    <div class="adds-selection2">
                        <select class='adds-selection2' id="craft" name="craft" ] style="color: #4e4e4e;">
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <br>

        <br><br><br> <br><br><br> <br><br><br>

    </div>
</body>