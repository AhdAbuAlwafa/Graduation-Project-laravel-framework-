<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title> الرئيسيه</title>
    <link href="{{ asset('assets/css/otherUserProfile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div>
        <div>
            <!----------------navbar------------------->
            @include('shared.navbar')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
        <div class="header__wrapper">
            <header></header>
            <div class="cols__container">
                <div class="left__col">
                    <div class="img__container">
                        <img src="assets/img/user-page.jpg" alt="صائب صلاح " />
                    </div>

                    <div class="center1">
                        <div class="stars1">
                            <input type="radio" id="one1" name="rate1" value="1">
                            <label for="one">2.4</label>
                            <span class="result"></span>
                        </div>
                    </div>
                    <h2>صائب صلاح</h2>
                    <h1>كهربجي</h1>
                    <ul class="evaluation">
                        <div class="center">
                            <div class="stars">
                                <input type="radio" id="five" name="rate" value="5">
                                <label for="five"></label>
                                <input type="radio" id="four" name="rate" value="4">
                                <label for="four"></label>
                                <input type="radio" id="three" name="rate" value="3">
                                <label for="three"></label>
                                <input type="radio" id="two" name="rate" value="2">
                                <label for="two"></label>
                                <input type="radio" id="one" name="rate" value="1">
                                <label for="one"></label>
                                <span class="result"></span>
                            </div>
                        </div>

                    </ul>

                    <div class="content">
                        <p>
                            اقوم بتصميم وتنفيذ التمديدات الكهربائيه باحدث الطرق الهندسيه وباسعار منافسه جدا ايضا اتميز
                            بتركيب النظمه
                            المنازل الذكيه وانظمه الحمايه والمراقبه اضافه الى صيانه جميع انواع الاجهزه الكهربائيه
                        </p>

                    </div>
                </div>




                <div class="second-part">
                    <div class="place">
                        <label>المكان : </label>
                        <span class="city">جنين </span>
                        <label>/</label>
                        <span class="village"> عنزا</span>
                    </div>

                    <div id="vertical-line"></div>
                    <div class="phone-num">
                        <label> رقم الهاتف : </label>
                        <span class="num">0599723795 </span>
                    </div>

                    <div id="vertical-line"></div>
                    <div class="worker-gender">
                        <label> الجنس : </label>
                        <span class="gender"> ذكر</span>
                    </div>

                    <div id="vertical-line"></div>
                    <div class="container mt-5">
                        <div class="d-flex justify-content-center row">
                            <div class="col-md-8">

                                <div class="bg-light p-2" style="width: 550px; margin-left: 400px;">
                                    <div class="d-flex flex-row align-items-start">
                                        <img src="assets/img/user-page.jpg" alt="" class="rounded-circle" width="90"
                                            height="90" style="margin: 12px;  box-shadow: 3px 5px 14px rgba(0, 0, 0, 0.5);
                      border: 4px solid white;">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px ; width: 400px;"></textarea>
                                            <label for="floatingTextarea2">اكتب تعليق</label>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-right">
                                        <button class="btn btn-sucsess btn-sm shadow-none " type="button"
                                            style="padding-left: 200px;">انشر
                                            التعليق</button>
                                    </div>

                                </div>
                                <div class="bg-light p-2" style="width: 550px; margin-top: 50px;">
                                    <div class="bg-light p-2" style="width: 540px; margin-top: 15px; ">
                                        <div class="d-flex flex-row user-info">
                                            <img src="assets/img/user-comment.jpg" alt="" width="80" height="80"
                                                class="rounded-circle" style="margin: 12px;  box-shadow: 3px 5px 14px rgba(0, 0, 0, 0.5);
                          border: 4px solid #fff;">
                                            <div class="d-flex flex-column justify-content-start ml-2"
                                                style="font-size: 21px; padding-left: 20px;">
                                                <span class="d-block font-weight-bold name"> ناصر عبيد</span>
                                                <span class="date text-black-50"> تم النشر - 5\7 </span>
                                            </div>
                                        </div>
                                        <div class="mt-3" style="font-size: 20px; padding-right: 100px; ">
                                            <p class="coment-text"> لقد انجز اعماله بحرفيه تامه والتزم بالوقت لكن لم
                                                يراعيني بالسعر ابدا </p>
                                        </div>
                                        <div id="vertical-line"></div>
                                    </div>
                                    <!---------------------second comment----------------------->
                                    <div class="bg-light p-2" style="width: 540px; margin-top: 15px; ">
                                        <div class="d-flex flex-row user-info">
                                            <img src="user-comment2.webp" alt="" width="80" height="80"
                                                class="rounded-circle" style="margin: 12px;  box-shadow: 3px 5px 14px rgba(0, 0, 0, 0.5);
                          border: 4px solid #fff;">
                                            <div class="d-flex flex-column justify-content-start ml-2"
                                                style="font-size: 21px; padding-left: 20px;">
                                                <span class="d-block font-weight-bold name"> عبد الفتاح محسن</span>
                                                <span class="date text-black-50"> تم النشر - 12\7 </span>
                                            </div>
                                        </div>
                                        <div class="mt-3" style="font-size: 20px; padding-right: 100px; ">
                                            <p class="coment-text"> افضل عامل بالنسبه لي لن اتردد في مكالمته مره اخرى في
                                                اي عمل ثاني للكهرباء
                                            </p>
                                        </div>
                                        <div id="vertical-line"></div>
                                    </div>
                                    <div class="bg-light p-2" style="width: 540px; margin-top: 15px; ">
                                        <div class="d-flex flex-row user-info">
                                            <img src="assets/img/user-comment3.jpg" alt="" width="80" height="80"
                                                class="rounded-circle" style="margin: 12px;  box-shadow: 3px 5px 14px rgba(0, 0, 0, 0.5);
                          border: 4px solid #fff;">
                                            <div class="d-flex flex-column justify-content-start ml-2"
                                                style="font-size: 21px; padding-left: 20px;">
                                                <span class="d-block font-weight-bold name"> ايوب عبيد</span>
                                                <span class="date text-black-50"> تم النشر - 20\8 </span>
                                            </div>
                                        </div>
                                        <div class="mt-3" style="font-size: 20px; padding-right: 100px; ">
                                            <p class="coment-text"> ياخذ اجر غالي قليلا لكن عمله ممتاز</p>
                                        </div>
                                        <div id="vertical-line"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>