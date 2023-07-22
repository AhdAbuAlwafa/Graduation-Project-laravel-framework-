@extends('layouts.app')

@section('content')
    <!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <link rel="stylesheet" href="assets/css/login.css">
        <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
    </head>


    <body>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
            integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
        </script>

        @include('shared.navbar')

        <div class="connn" dir="rtl">


            <div class="continer" dir="rtl">
                <div class="box">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="box-login" id="login">
                            <div class="top-header">
                                <h3>مرحبا مجددا</h3>
                                <small>نحن سعيدون بقدومك مجددا</small>
                            </div>

                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <div class="input-groub">
                                <div class="input-field">
                                    <input type="text" class="input-box" id="logphone" name="number"
                                        required="required">
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

                    <form action="{{ route('register') }}" method="post" id="regform">
                        @csrf
                        <div class="box-register" id="register">

                            <div class="top-header2">
                                <h3>قم بانشاء حسابك الان ! </h3>
                                <small>نحن سعيدون بانضمامك الينا</small>
                            </div>
                            <span id="errors" class="error-text fname_error"></span>
                            <span id="errors" class="error-text lname_error"></span>
                            <span id="errors" class="error-text phone_error"></span>
                            <span id="errors" class="error-text description_error"></span>
                            <span id="errors" class="error-text password_error"></span>
                            <span id="errors" class="error-text gender_error"></span>

                            
                            
                            <!-------------------------اسم الشخص------------------------------------------>
                            <div class="row">

                                <div class="col">
                                    <div class="input-field2">
                                        <input type='text' class='input-box2' placeholder="الاسم الاول" name="fname"
                                            id="reg-user" >
                                            @error('password_confirmation')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="input-field-left">
                                        <input type='text' class='input-box2' placeholder="اسم العائلة" name="lname"
                                            id="reg-family" >
                                            @error('lname')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>

                            </div>


                            <!--------------------------------مكانه row---------------------->
                            <div class="row">

                                <div class="col">
                                    <div class="input-field2">
                                        <div class="select-country">
                                            <select class='input-box2' id="village_name_select1" name="village_name"
                                                style="color: #4e4e4e;">
                                                <option value="all" selected>اخترالقرية/البلدة</option>

                                            </select>
                                            @error('village_name')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="input-field-left">
                                        <div class="select-country">
                                            <select class='input-box2' id="city_name_select1" name="city_name"
                                                style="color: #4e4e4e;">
                                                <option value="all" selected>اختر المدينة</option>
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
                                </div>

                            </div>


                            <!-------------------num------------------------------->
                            <div class="row">
                                <div class="col">
                                    <div class="input-field-left">
                                        <input type='text' class='input-box-num' placeholder=" رقم الهاتف"
                                            id="phone" name="number" required>
                                            @error('number')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>


                            <!-------------------------------------password and confirm--------------------->
                            <div class="row">
                                <div class="col">
                                    <div class="input-field2">
                                        <input type='text' class='input-box2' placeholder=" كلمة السر" id="reg-user"
                                            name="password" required>
                                            @error('password')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-field-left">
                                        <input type='text' class='input-box2' placeholder="تاكيد كلمة السر "
                                            id="reg-family" name="password_confirmation" required>
                                            @error('password_confirmation')
                                                <div class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <!------------------------------gender---------------------------------->

                            <div class="row" style="margin-top: 10px;">

                                <div class="gender-box">

                                    <div class="gender-option">
                                        <div class="col-lg-2 col-md-12 col-12">
                                            <h2>الجنس</h2>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-12">
                                            <div class="gender">
                                                <input type='radio' id="check-male" id="reg-user" name="gender"
                                                    value="0">
                                                <label for="check-male" style="font-size: 23px; margin-top: 5px; font-weight: bold;">
                                                    ذكر</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-12">
                                            <div class="gender">
                                                <input type='radio' id="check-female" name="gender" value="1"
                                                    id="reg-user">
                                                <label for="check-male" style="font-size: 23px; margin-top: 5px; font-weight: bold;">
                                                    انثى</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!---------------------------image--------------------------------------->
                           
                            <div class="row">
                                <div class="input-field2">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                                        style="display: none;">
                                    <label for="image" class='input-box2' class="form-label"
                                        style="height: 50px ; width: 350px; border-radius: 6px; border: 1px dashed black;">
                                        اضافة صورة شخصية</label>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                               
                                


                            <!-------------------craft------------------------------->
                            <div class="row1" style="margin-top: 10px;">
                                <div class="col1" >
                                    
                                    
                                    <label for="workercheck">هل انت عامل؟</label> 
                                    <input type="radio" value="1" name="is_worker" onclick="enabled(this)" style="margin-right: 20px;">
                                    <label for="is_worker"  style="margin-right: 5px;">نعم</label>
                                    
                                    <input type="radio" value="0" name="is_worker" onclick="enabled(hidden)" style="margin-right: 20px;" >
                                    <label  for="is_worker" style="margin-right: 5px;" >لا</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-field-left">
                                        <div class="select-country">
                                            <select class='input-box-num' id="crafts" name="craft"
                                                style="color: #4e4e4e; visibility: hidden;">
                                                @foreach ($crafts as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->craft_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <br>
                                        <input type='text' class='input-box3' placeholder="وصف المهنه " id="reg-description"
                                        name="description" style="visibility: hidden;" >
                                    </div>
                                </div>
                            </div>
                          

                            <!--------------------------------------تjob-desc------------------------------------------------->
                            
                            <!---------------------------------submit------------------------------------->
                            <div class="input-field" id="register-submit" style="margin-top: -130px;">
                                <button type="submit" class="input-submit2" >
                                    تسجيل
                                </button>
                            </div>

                        </div>
                    </form>
                    <!--------------------switch----------------->

                    <div class="switch">
                        <a href="#" class="login" onclick="login()">تسجيل الدخول</a>
                        <a href="#" class="register" onclick="register()">انشاء حساب</a>
                        <div class="btn" id="btn"></div>
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            
            
                <script>
                    var x = document.getElementById('login');
                    var y = document.getElementById('register');
                    var z = document.getElementById('btn');

                    function login() {
                        x.style.left = "3px";
                        y.style.right = "-500px";
                        z.style.left = "203px";
                    }

                    function register() {
                        x.style.left = "-500px";
                        y.style.right = "45px";
                        z.style.left = "0px";
                    }
                    //ajax

                    $(function() {
                        $('#regform').on('submit', function(e) {
                            e.preventDefault();

                            $.ajax({
                                url: $(this).attr('action'),
                                method: $(this).attr('method'),
                                data: new FormData(this),
                                processData: false,
                                dataType: 'json',
                                contentType: false,
                                beforSend: function() {
                                    $(document).find('#errors').empty();
                                    console.log('bd');
              
                                },
                                success: function(data) {
                                    if (data.status == 0) {
                                    $(document).find('.error-text').text('');

                                        $.each(data.error, function(prefix, val) {
                                            $('span.' + prefix + '_error').text(val[0]);

                                        });

                                    } else {
                                        $(document).find('.error-text').text('');

                                        $('#regform').trigger('reset')

                                    }
                                }

                            })

                        })
                    })
                </script>
                <script>
                    function enabled(workercheck) {
                        var description = document.getElementById("reg-description");
                        var crafts = document.getElementById("crafts");
                        var register = document.getElementById("register-submit");
                        if (workercheck.checked) {
                            crafts.style.visibility = 'visible'; // Show
                            description.style.visibility = 'visible'; // Show
                            description.focus();
                            register.style.marginTop = '25px';
                        } else {
                            crafts.style.visibility = 'hidden'; // Hide
                            description.style.visibility = 'hidden'; // Hide
                            register.style.marginTop = '-130px';
                        }


                    }
                </script>
<script>
    // function enabled() {
    //     var description = document.getElementById("reg-description");
    //     var crafts = document.getElementById("crafts");
    //     if (hidden.checked) {
    //         crafts.style.visibility = 'hidden'; // Hide
    //         description.style.visibility = 'hidden'; // Hide
    //     } 


    // }
</script>



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
                                            '<option value="all">Select Village</option>');
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
                                $('#village_name_select1').html('<option value="all">Select Village</option>');
                            }
                        });
                    });
                </script>
            </div>
    </body>

    </html>
@endsection
