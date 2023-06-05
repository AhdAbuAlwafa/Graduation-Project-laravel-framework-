@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="assets/css/login.css">

<div class="container">
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
                        <label for="logpassword">كلمه السر</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="remember">
                    <input type="checkbox" id="formcheck" class="check">
                    <label for="formcheck">تذكر كلمه السر</label>
                </div>
                <div class="input-field">
                    <button type="submit" class="input-submit">
                        تسجيل الدخول
                    </button>
                </div>
                <div class="forget">
                    <a href="#">هل نسيت كلمه السر؟ </a>
                </div>
            </div>
        </form>

        <!--------------- regester--------->
        <div class="box-register" id="register">

            <div class="top-header">
                <h3>قم بانشاء حسابك الان ! </h3>
                <small>نحن سعيدون بانضمامك الينا</small>
            </div>

            <div class="input-groub">
                <div class="input-field">
                    <input type='text' class='input-box' id="reg-user" required>
                    <label for="reg-user"> الاسم الاول </label>
                </div>

                <div class="input-field">
                    <input type='text' class='input-box' id="reg-family" required>
                    <label for="reg-family"> اسم العائلة </label>
                </div>
                <div class="input-field">
                    <label> المدينه </label>
                    <br>
                </div>

                <div class="input-field">
                    <select class="input-box" id="city">
                        <option> جنين</option>
                        <option> نابلس</option>
                        <option> طولكرم</option>
                    </select>
                </div>
                <div class="input-field">
                    <label> القرية </label>
                    <br>

                </div>

                <div class="input-field">
                    <select class="input-box" id="village">
                        <option> عنزا</option>
                        <option> عجة</option>
                        <option> جبع</option>
                    </select>
                </div>

                <br>
                <br>

                <div class="note">
                    <label>ان كنت من سكان المدينه الرجاء اختيار"المدينه نفسها" من قائمه البلده في الاعلى</label>
                </div>

                <div class="input-field">
                    <input type='text' class='input-box' id="reg-phone" required>
                    <label for="reg-phone"> رقم الهاتف </label>
                    <div class="input-field">
                        <label> المهنه </label>
                        <br>
                    </div>

                    <div class="input-field">
                        <select class="input-box" id="crafts">
                            <option> دهان</option>
                            <option> حداد</option>
                            <option> نجار</option>
                        </select>
                    </div>
                </div>
                <div class="input-field">
                    <input type='text' class='input-box' id="reg-description" required>
                    <label for="reg-description">وصف المهنة </label>
                </div>
                <div class="input-field">
                    <label>الجنس</label>
                </div>

                <div class="input-box">
                    <input type='checkbox' class='check-box'><span>انثى</span>
                    <input type='checkbox' class='check-box'><span>ذكر</span>
                </div>
                <div class="input-field">
                    <input type="password" class="input-box" id="regPassword" required>
                    <label for="regPassword">كلمه السر</label>
                </div>
                <div class="input-field">
                    <input type="password" class="input-box" id="regPassword2" required>
                    <label for="regPassword2">تاكيد كلمه السر</label>
                </div>

                <div class="input-field">
                    <input type="submit" class="input-submit" value="Sign In">
                </div>

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
            z.style.left = "200px";
        }
        function register() {
            x.style.left = "-500px";
            y.style.right = "45px";
            z.style.left = "0px";
        }
    </script>
</div>
@endsection