@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="assets/css/login.css">


<body>
   
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
                
     <form action="{{route('register')}}" method="post" id="regform">
        @csrf 
            <div class="box-register" id="register">

                <div class="top-header">
                    <h3>قم بانشاء حسابك الان ! </h3>
                    <small>نحن سعيدون بانضمامك الينا</small>
                </div>
                <span class="error-text fname_error"></span>
                <span class="error-text lname_error"></span>
                <span class="error-text phone_error"></span>
                <span class="error-text description_error"></span>
                <span class="error-text password_error"></span>
                <span class="error-text gender_error"></span>
    
                <!-------------------------اسم الشخص------------------------------------------>
                <div class="row">
                    <div class="col">
                        <div class="input-field2">
                            <input type='text' class='input-box2' placeholder="الاسم الاول" name="fname" id="reg-user" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <input type='text' class='input-box2' placeholder="اسم العائلة" name="lname" id="reg-family" required>
                        </div>
                    </div>
                </div>



                <!--------------------------------مكانه row---------------------->
                <div class="row">
                    <div class="col">
                        <div class="input-field2">
                            <div class="select-country">
                                <select class='input-box2' id="village" name="village" style="color: #4e4e4e;">
                                    @foreach ($address as $item)
                                    <option value="{{$item->id}}">{{$item->village_name}}</option>
            
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <div class="select-country">
                                <select class='input-box2' id="city" name="city" style="color: #4e4e4e;">
                                    @foreach ($address as $item)
                                    <option value="{{$item->id}}">{{$item->city_name}}</option>
            
                                    @endforeach
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
                                <select class='input-box2' id="crafts" name="craft" style="color: #4e4e4e;">
                                    @foreach ($crafts as $item)
                                    <option value="{{$item->id}}">{{$item->craft_name}}</option>
        
                                    @endforeach
        
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <input type='text' class='input-box2' placeholder=" رقم الهاتف" id="phone" name="number" required>
                        </div>
                    </div>
                </div>
                <!--------------------------------------تjob-desc------------------------------------------------->
                <div class="input-field-left">
                    <input type='text' class='input-box3' placeholder="وصف المهنه " id="reg-description"  name="description" required>
                </div>
                <!-------------------------------------password and confirm--------------------->
                <div class="row">
                    <div class="col">
                        <div class="input-field2">
                            <input type='text' class='input-box2' placeholder=" كلمة السر" id="reg-user" name="password" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field-left">
                            <input type='text' class='input-box2' placeholder="تاكيد كلمة السر " id="reg-family"
                            name="password_confirmation" required>
                        </div>
                    </div>
                </div>

                <!------------------------------gender---------------------------------->
                <div class="gender-box">
                    <h2>الجنس</h2>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gender" value="0" checked/>
                            <label for="check-male"> انثى</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="gender" value="1" />
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
            //ajax
    
            $(function(){
                $('#regform').on('submit',function(e){
                    e.preventDefault();
    
                    $.ajax({
                        url:$(this).attr('action'),
                        method:$(this).attr('method'),
                        data: new FormData(this),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforSend:function(){
                            $(document).find('span.error-text').text('');
                        },
                        success:function(data){
                            if(data.status == 0 ){
                                $.each(data.error,function(prefix,val){
                                    $('span.'+prefix+'_error').text(val[0]);
    
                                });
                            }else{
                                $('#regform')[0].reset[0]
                            }
                        }
    
                    })
    
                })
            })
    
    
    
        </script>

















    </div>
</body>
@endsection