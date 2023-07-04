@extends('userPage.navbar')
@section('content')

<section class="py-5 my-5">
    <div class="container"dir="rtl">
        <h1 class="mb-5">حسابي</h1>
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">

                        <img src="{{ 'images/' . auth()->user()->image }}" alt="Image" class="shadow" id="profileImg">

                    </div>
                    <div>
                        <form action="{{ route('uploadimg') }}" method="post" id="imgform">
                            @method('post')
                            @csrf
                            <input type="file" name="image" hidden id="ipt"
                                accept="image/png, image/gif, image/jpeg , image/svg , image/jpg">
                            <button href="" id="btn" class="btn80 btn-primary" disabled>تغيير الصورة الشخصية</button>
                        </form>
                    </div>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                        <i class="fa fa-home text-center mr-1"></i> 
                        المعلومات الشخصية
                    </a>
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                        <i class="fa fa-key text-center mr-1"></i> 
                    اعدادات كلمة المرور
                    </a>

                    @if (!$user->is_worker)
                    <a class="nav-link" id="security-tab" data-toggle="pill" href="#toggleBoxContainer" role="tab" aria-controls="security" aria-selected="false">
                        <i class="fa fa-user text-center mr-1"></i> 
                        تحويل الحساب
                    </a>
                    @endif

                    <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                        <i class="fa fa-tv text-center mr-1"></i> 
                        الاعلانات
                    </a>

                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">تعديل المعلومات الشخصية</h3>
                    <form action="{{ route('userPage.update') }}"method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم الاول</label>
                                    <input type="text" class="form-control" name="fname"
                                        value="{{ $user->fname }}">
                                    @error('fname')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم العائلة</label>
                                    <input type="text" class="form-control" name="lname"
                                        value="{{ $user->lname }}">
                                    @error('lname')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="text" class="form-control" name="number"
                                        value="{{ $user->number }}">
                                    @error('number')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
    
                                    <label>المدينة</label>
    
                                    <select class="form-control form-select mt-3" aria-label="Default select example"
                                        id="city_name" name="city_name">
    
                                        @foreach ($cities as $id => $name)
                                            <option value="{{ $name }}"
                                                {{ $user->addresses->city_name == $name ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>القرية</label>
                                <select class="form-control form-select mt-3" aria-label="Default select example"
                                    id="village_name" name="village_name">
                                    @foreach ($village as $id => $name)
                                        <option value="{{ $name }}"
                                            {{ $user->addresses->village_name == $name ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        @if ($user->is_worker == 1)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>وصف المهنة</label>
                                    <textarea class="form-control" rows="4" name="description"> {{ $user->description }}</textarea>
                                    @error('description')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المهنة</label>
                                    <select class=" form-select form-select-sm"
                                        aria-label=".form-select-sm example" name="craft_name">
                                        @foreach ($crafts as $craft)
                                            <option selected disabled></option>
                                            <option value="{{ $craft->id }}">{{ $craft->craft_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="crafts">

                            <label class="namecraft"> اسم المهنة</label>
                            <label>حذف المهنة </label>

                            <br>

                            @foreach ($user->crafts as $craft)
                                <div class="craft-item">
                                    <label class="namecraftuser"> {{ $craft->craft_name }}</label>
                                    <a href="#" class="delete-craft" data-user="{{ $user->id }}"
                                        data-craft="{{ $craft->id }}"><i class="fa-solid fa-trash-can"
                                            style="color: #e23f08;"></i></a>

                                </div>
                            @endforeach
                            <br>
                            <br>
                            <button class="btn btn-danger" style="color:azure;"id="delete-all-crafts"
                                data-user="{{ $user->id }}">حذف جميع المهن </button>
                            <br>
                            <br>
                        </div>

                        @endif
                        <div>
                            <button type="submit" class="btn btn-primary">تعديل</button>
                            <button class="btn btn-light">الغاء</button>
                        </div>
                    </form>
                </div>
                    
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <h3 class="mb-4">تعديل كلمة المرور</h3>
                    <form action="{{ route('userPage.changePassword') }}" method="post">
                        @csrf
                        @method('post')
                    @php
                    
                    @endphp
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="old">كلمة السر القديمة</label>
                                    <input type="password" class="form-control" name="old">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="password">كلمة السر الجديدة</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="password_confirmation">تأكيد كلمة السر الجديدة</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">تعديل</button>
                            <button class="btn btn-light">الغاء</button>
                        </div>

                    </form>
                </div>
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <h3 class="mb-4">تحويل الحساب</h3>
                    
                    
                </div>

                <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                    <h3 class="mb-4">اعلاناتي</h3>
                    <div class="row">
                        @foreach ($advertisements as $advertisement)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> المهنة:{{ $advertisement->job_name }}</h5>
                                        <p class="card-text">وصف المهنة:{{ $advertisement->job_des }}</p>
                                        <p class="card-text">المدينة: {{ $advertisement->addresses->city_name }}</p>

                                        <p class="card-text">القرية/البلدة:
                                            {{ $advertisement->addresses->village_name }}</p>
                                        <p class="card-text">عدد ساعات العمل المطلوبة::
                                            {{ $advertisement->work_hour }}</p>
                                        <p class="card-text"> متطلبات العمل: {{ $advertisement->adv_req }}</p>
                                        <p class="card-text">فترة العمل: {{ $advertisement->work_period }}</p>
                                        <p class="card-text"> جنس المهني : {{ $advertisement->gender }}</p>

                                        <!-- Add more details as needed -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                    <h3 class="mb-4">Notification Settings</h3>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification1">
                            <label class="form-check-label" for="notification1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification2" >
                            <label class="form-check-label" for="notification2">
                                hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification3" >
                            <label class="form-check-label" for="notification3">
                                commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
                            </label>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<script>
    $(function() {
        $('#btn').removeAttr('disabled')
        $('#imgform').on('submit', function(e) {
            e.preventDefault()
            if ($('#btn').text() == 'تغيير الصورة الشخصية') {
                $('#ipt').click()
                $('#ipt').on('change', function() {
                    $('#btn').text('تحميل الصورة')
                })
            } else {
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforSend: function() {
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                console.log(val[0]);
                            });
                        } else if (data.status == 1) {
                            $('#imgform')[0].reset[0]
                            $('#btn').text('تغيير الصورة الشخصية')
                            $("#profileImg").attr('src', 'images/' + data.image);
                            console.log('success');
                        }
                    }
                })
            }

        })

    })
</script>


<script>
    $(document).ready(function() {
        $('.delete-craft').click(function(e) {
            e.preventDefault();
            var user = $(this).data('user');
            var craft = $(this).data('craft');

            deleteCraft(user, craft, $(this));
        });

        $('#delete-all-crafts').click(function(e) {
            e.preventDefault();
            var user = $(this).data('user');

            deleteAllCrafts(user);
        });

        function deleteCraft(user, craft, element) {
            $.ajax({
                url: '{{ route('craft.delete') }}',
                type: 'POST',
                data: {
                    user: user,
                    craft: craft,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Craft deleted successfully
                    console.log(response.message);
                    // Remove the craft item from the DOM
                    element.closest('.craft-item').remove();
                },
                error: function(xhr) {
                    // Failed to delete craft
                    console.error('فشل في حذف المهنة ');
                }
            });
        }

        function deleteAllCrafts(user) {
            $.ajax({
                url: '{{ route('craft.deleteAll') }}',
                type: 'POST',
                data: {
                    user: user,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // All crafts deleted successfully
                    console.log(response.message);
                    // Remove all craft items from the DOM
                    $('.craft-item').remove();
                },
                error: function(xhr) {
                    // Failed to delete all crafts
                    console.error('فشل في حذف جميع المهن ');
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Listen for change event on ToggleBox
        $('#toggleBox').change(function() {
            if ($(this).is(':checked')) {
                $('#craftFields').show();
            } else {
                $('#craftFields').hide();
            }
        });

        // Submit the form via AJAX
        $('#becomeWorkerForm').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize();

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Success message
                        alert('لقد تم تحويل الحساب الى عامل بنجاح ');

                        // Refresh the page to hide the toggle box
                        location.reload();
                    } else {
                        // Error message
                        alert('فشل في تحويل الحساب الى عامل .حاول مرة اخرى');
                    }
                },
                error: function(xhr, status, error) {
                    // Error message
                    alert('حدث خطأ.حاول مرة اخرى');
                }
            });
        });
    });
</script>











<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
