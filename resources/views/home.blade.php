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
</head>

<body>
    <!-------bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <!-----------------coursal------------------>

    <div class="carousel slide" style="width: 100%;" data-bs-ride="carousel" id="carouselExampleIndicators">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="..." class="d-block w-100" src="assets/img/bghome.webp">
                <div class="carousel-caption">
                    <h5>ابحث عن افضل العمال في منطقتك </h5>
                    <p style="font-size: 23px;  width: 60%; margin: auto; line-height: 1.9;">قيم العمال وتصفح التعليقات على صفحاتهم الشخصيه واختر افضل العمال باقل وقت واقل جهد</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="assets/img/bghome3.jpg">
                <div class="carousel-caption">
                     <h5>ابحث عن افضل العمال في منطقتك </h5>
                     <p style="font-size: 23px;  width: 60%; margin: auto; line-height: 1.9;">قيم العمال وتصفح التعليقات على صفحاتهم الشخصيه واختر افضل العمال باقل وقت واقل جهد</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="assets\img\bghome2.jpeg">
                <div class="carousel-caption">
                    <h5>ابحث عن افضل العمال في منطقتك </h5>
                    <p style="font-size: 23px;  width: 60%; margin: auto; line-height: 1.9;">قيم العمال وتصفح التعليقات على صفحاتهم الشخصيه واختر افضل العمال باقل وقت واقل جهد</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="up-page">
            <!-----------------search----------------->
            <div class="searchbox1">
                <div class="searchbox2">
                    <input type='text' placeholder="ابحث عن عامل " style="color: black;">
                    <a href="#">
                        <i class="fa fa-magnifying-glass" style="font-size: 30px; color: rgb(38, 0, 255); "></i>
                    </a>
                </div>
            </div>
            
        </div>
        <!----------------navbar------------------->
        @include('shared.navbar')
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

                    <a href="{{ route('userPage.getAllUser', ['profession' => $craft->id]) }}"
                        class="btn btn-primary">{{ $craft->craft_name }} </a>

                </div>
            </div>
            @endforeach
            
        </div>

        <!------------------------start of adds
        <div class="adds">
            <div class="center2">
                <h1>اعلانات البحث عن مهني</h1>

            </div>
        </div>
        <br><br><br>-------------------->
        <!------------------------adss of free work
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

    </div>---------------->
</body>
</html>