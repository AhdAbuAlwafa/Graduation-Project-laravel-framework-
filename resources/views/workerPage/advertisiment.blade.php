@extends('userpage.navbar')

@section('content')

<form id="advertisementForm">
  @method('post')
  {{ csrf_field() }}


  @if (Auth::user()->is_worker == 1)
  <div>

    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#advertisiment-modal1" onclick="submitForm('workshops')">إضافة اعلان ورشات عمل</a>

  </div>
  <div>

    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#advertisiment-modal" onclick="submitForm('workAlone')">إضافة اعلان عمل حر</a>

  </div>
  @elseif(Auth::user()->is_worker == 0)
  <div>
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#advertisiment-modal" onclick="submitForm('workAlone')">إضافة اعلان عمل حر</a>

  </div>
  @endif
</form>

<div class="modal" tabindex="-1" id="advertisiment-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">إضافة اعلان عمل حر</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('workerPage.store')}}" method="post" id="advertisementFormSubmit">

          @method('post')
          {{ csrf_field() }}
          <input type="hidden" name="advertisement_type" value="workAlone">

          <div class="row" dir="rtl">
            <div class="col">
              <select class="form-control8 form-select mt-3  justify-content-end" aria-label="Default select example" name="adv_period">

                <option selected value="" selected Disabled>اختر مدة الاعلان</option>
                <option value="1">يوم</option>
                <option value="2">يومان</option>
                <option value="3 ">ثلاثة ايام</option>
                <option value="4 ">اربعة ايام</option>
                <option value="5 ">خمسة ايام</option>
                <option value="6 ">ستة ايام</option>
                <option value="7">سبعة ايام</option>
              </select>
              @error('adv_period')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror

            </div>
            <div class="col">
              <div class="select1">

                <select class="form-control8 form-select mt-3" aria-label="Default select example" name="job_name">
                  <option selected>اختر المهنة المطلوبة</option>
                  @foreach($crafts as $craft)
                  <option value="{{$craft->craft_name}}">{{$craft->craft_name}}</option>
                  @endforeach
                </select>

              </div>
              @error('job_name')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row" dir="rtl">
            <div class="col">
              <select class="form-control8 form-select mt-3 " aria-label="Default select example" id="village_name_select" name="village_name">
                <option value="all" selected>اخترالقرية/البلدة</option>

              </select>
              @error('village_name')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <select class="form-control8 form-select mt-3" aria-label="Default select example" id="city_name_select" name="city_name">
                <option value="all" selected>اختر المدينة</option>
                @foreach($cities as $cityName)
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
          <div class="row" dir="rtl">
            <div class="col">
              <textarea class="form-control8" id="IP" cols="45" rows="2" name="job_des" placeholder="وصف الوظيفة"></textarea>
              @error('job_des')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">غير محدد </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR3" value="غير محدد">

          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">نهارية وليلية </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR4" value="نهارية وليلية">

          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">ليلية </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR5" value="ليلية">

          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">نهارية </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR6" value="نهارية">
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">الفتره</label>
          </div>
          <div class="t-work">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="IR1" value="male">
              <label class="form-check-label" for="inlineRadio1">ذكر</label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">انثى </label>
              <input class="form-check-input" type="radio" name="gender" id="IR2" value="female">
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">جنس المهني</label>
            </div>


          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-secondary">انشر</button>
          </div>
        </form>

        <div id="messageModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <p id="messageText"></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="advertisiment-modal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">إضافة اعلان ورشات عمل </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('workerPage.store')}}" method="post" id="advertisementFormSubmit">
          @csrf

          {{ csrf_field() }}
          <input type="hidden" name="advertisement_type" value="workshops ">

          <div class="row" dir="rtl">
            <div class="col">
              <select class="form-control8 form-select mt-3  justify-content-end" aria-label="Default select example" name="adv_period">

                <option selected>اختر مدة الاعلان</option>
                <option value="1">يوم</option>
                <option value="2">يومان</option>
                <option value="3">ثلاثة ايام</option>
                <option value="4">اربعة ايام</option>
                <option value="5">خمسة ايام</option>
                <option value="6">ستة ايام</option>
                <option value="7">سبعة ايام</option>
              </select>
              @error('adv_period')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <div class="select1">

                <select class="form-control8 form-select mt-3" aria-label="Default select example" name="job_name">
                  <option selected>اختر المهنة المطلوبة</option>
                  @foreach($crafts as $craft)
                  <option value="{{$craft->craft_name}}">{{$craft->craft_name}}</option>
                  @endforeach
                </select>
              </div>
              @error('job_name')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row" dir="rtl">
            <div class="col">

              <select class="form-control8 form-select mt-3 " aria-label="Default select example" id="village_name_select1" name="village_name">
                <option value="all" selected>اخترالقرية/البلدة</option>

              </select>

            </div>
            <div class="col">
              <select class="form-control8 form-select mt-3" aria-label="Default select example" id="city_name_select1" name="city_name">
                <option value="all" selected>اختر المدينة</option>
                @foreach($cities as $cityName)
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
          <div class="row" dir="rtl">
            <div class="col">
              <select class="form-control8 form-select mt-3  justify-content-end" aria-label="Default select example" name="work_hour">

                <option selected>عدد ساعات العمل</option>
                <option value="8">8</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="14">14</option>
                <option value="12">12</option>
                <option value="6">6</option>
              </select>

              @error('work_hour')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row" dir="rtl">
            <div class="col">
              <textarea class="form-control8" id="IP" cols="45" rows="2" name="job_des" placeholder="وصف الوظيفة"></textarea>
              @error('job_des')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col">
              <textarea class="form-control8" id="IP" cols="45" rows="2" name="adv_req" placeholder="متطلبات الوظيفة"></textarea>
              @error('adv_req')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">غير محدد </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR3" value="غير محدد">

          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">نهارية وليلية </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR4" value="نهارية وليلية">

          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">ليلية </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR5" value="ليلية">

          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">نهارية </label>
            <input class="form-check-input" type="radio" name="work_period" id="IR6" value="نهارية">
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">الفتره</label>
          </div>
          <div class="t-work">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="IR1" value="male">
              <label class="form-check-label" for="inlineRadio1">ذكر</label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">انثى </label>
              <input class="form-check-input" type="radio" name="gender" id="IR2" value="female">
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">جنس المهني</label>

            </div>






          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-secondary">انشر</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>




@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
  $(document).ready(function() {
    $('#advertisementForm').submit(function(event) {
      event.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: '{{ route("workerPage.store") }}',
        data: formData,
        success: function(response) {

          $('#messageText').text(response.message);
          $('#messageModal').modal('show');
        },
        error: function(xhr, status, error) {

          console.error(xhr.responseText);
        }
      });
    });
  });
</script>

<script>
  function submitForm(advertisementType) {
    $('input[name="advertisement_type"]').val(advertisementType);

    $('#advertisementForm').submit();
  }
</script>

<script>
  $(document).ready(function() {
    $('#advertisementFormSubmit').submit(function(event) {
      event.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: '{{ route("workerPage.store") }}',
        data: formData,
        success: function(response) {
          if (response.message) {
            alert(response.message);
          } else {
            $('#advertisementForm')[0].reset();
            // Display a success message
            alert('Advertisement posted successfully!');
          }
        },
        error: function(xhr, status, error) {
          // Handle error response here
          // Display the error message in the console for debugging
          console.error(xhr.responseText);
        }
      });
    });
  });
</script>