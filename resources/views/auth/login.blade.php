@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="assets/css/login.css">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <script src="js/cdnjs.cloudflare.com_ajax_libs_popper.js_1.11.0_umd_popper.min.js"></script>
    <script src="js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <div class="continer" dir="rtl">
        <div class="box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="box-login" id="login">
                    <div class="top-header">
                        <h3>مرحبا مجددا</h3>
                        <small>نحن سعيدون بقدومك مجددا</small>
                    </div>

                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error')}}
                    </div>
                    @endif
                    <div class="input-groub">
                        <div class="input-field">
                            <input type="text" class="input-box" id="logphone" name="number" required="required">
                            <label for="logphone"> رقم الهاتف</label>

                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" id="logpassword" name="password" required>
                            <label for="logpassword">كلمة السر</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-field">
                            <input type="checkbox" id="formcheck" class="check">
                            <label for="formcheck">تذكر كلمة السر</label>
                        </div>
                        <div class="input-field">
                            <button type="submit" class="input-submit">
                                تسجيل الدخول
                            </button>
                        </div>
                        <div class="forget">
                            <a href="#">هل نسيت كلمة السر؟ </a>
                        </div>
                    </div>
                </div>
            </form>

            <!--------------- regester--------->
            <div class="box-register" id="register">

                <div class="top-header">
                    <h3>قم بانشاء حسابك الان ! </h3>
                    <small>نحن سعيدون بانضمامك الينا</small>
                </div>
                <!-------------------------اسم الشخص------------------------------------------>
                <div class="row">
                    <div class="col">
                        <div class="input-field2">
                            <input type='text' class='input-box2' placeholder="الاسم الاول" id="reg-user" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <input type='text' class='input-box2' placeholder="اسم العائلة" id="reg-family" required>
                        </div>
                    </div>
                </div>



                <!--------------------------------مكانه row---------------------->
                <div class="row">
                    <div class="col">
                        <div class="input-field2">
                            <div class="select-country">
                                <select class='input-box2' style="color: #4e4e4e;">
                                    <option> القريه</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <div class="select-country">
                                <select class='input-box2' style="color: #4e4e4e;">
                                    <option> المدينه</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-------------------num and craft------------------------------->
                <div class="row">
                    <div class="col">
                        <div class="input-field2">
                            <div class="select-country">
                                <select class='input-box2' style="color: #4e4e4e;">
                                    <option>المهنه</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <input type='text' class='input-box2' placeholder=" رقم الهاتف" id="phone" required>
                        </div>
                    </div>
                </div>
                <!--------------------------------------تjob-desc------------------------------------------------->
                <div class="input-field-left">
                    <input type='text' class='input-box3' placeholder="وصف المهنه " id="reg-user" required>
                </div>
                <!-------------------------------------password and confirm--------------------->
                <div class="row">
                    <div class="col">
                        <div class="input-field2">
                            <input type='text' class='input-box2' placeholder=" كلمة السر" id="reg-user" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <input type='text' class='input-box2' placeholder="تاكيد كلمة السر " id="reg-family"
                                required>
                        </div>
                    </div>
                </div>

                <!------------------------------gender---------------------------------->
                <div class="gender-box">
                    <h2>الجنس</h2>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gender" checked />
                            <label for="check-male"> انثى</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="gender" />
                            <label for="check-female"> ذكر</label>
                        </div>
                    </div>
                </div>

                <!---------------------------------submit------------------------------------->
                <div class="input-field">
                    <button type="submit" class="input-submit2">
                        تسجيل
                    </button>
                </div>

            </div>

            <!--------------------switch----------------->

            <div class="switch">
                <a href="#" class="login" onclick="login()">تسجيل الدخول</a>
                <a href="#" class="register" onclick="register()">انشاء حساب</a>
                <div class="btn" id="btn"></div>
            </div>
        </div>

        <script>
            var x = document.getElementById('login');
            var y = document.getElementById('register');
            var z = document.getElementById('btn');

            function login() {
                x.style.left = "3px";
                y.style.right = "-500px";
                z.style.left = "205px";
            }
            function register() {
                x.style.left = "-500px";
                y.style.right = "45px";
                z.style.left = "0px";
            }
        </script>
    </div>
</body>
@endsection