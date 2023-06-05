@extends('userPage.navbar')
@section('content')


<div class="container text-center my-5">
<form method="post" action="{{route('userPage.store')}}">
  @csrf



   <div class="row col-3">
<select class="form-control form-select mt-3  justify-content-end" aria-label="Default select example" name="work_hour">
  <option selected>اختر مدة الاعلان</option>
  <option value="1">يوم</option>
  <option value="2">يومان</option>
  <option value="3">ثلاثة ايام</option>
  <option value="4">اربعة ايام</option>
  <option value="5">خمسة ايام</option>
  <option value="6">ستة ايام</option>
  <option value="7">سبعة ايام</option>




</select>
              </div>
<div class="select1">
              <div class="row col-3">
<select class="form-control form-select mt-3" aria-label="Default select example" name="job_name">
  <option selected>اختر المهنة المطلوبة</option>
  @foreach($crafts as $craft) 
  <option value="{{$craft->craft_name}}">{{$craft->craft_name}}</option>
  @endforeach

</select>
              </div>
              </div>



<div class="row col-3">

<select class="form-control form-select mt-3" aria-label="Default select example" name="address_id">
  <option selected>اختر مدينتك</option>
  @foreach($addresses as $address) 
  <option value="{{$address->id}}">{{$address->city_name}}</option> 
 
  @endforeach
</select>
              </div>

              <div class="row col-3">

              <div class=" m-auto">
<select class="form-control form-select mt-3 " aria-label="Default select example" name="address_id">
  <option selected>اختر بلدتك </option>
  @foreach($addresses as $address) 
  <option value="{{$address->id}}">{{$address->village_name}}</option> 
 
  @endforeach
</select>
              </div>
              </div>


<div class="problem">
  <div class="mb">
     <textarea class="form-control1" id="exampleFormControlTextarea1" cols="60" rows="3" name="job_des"></textarea>
     <label for="exampleFormControlTextarea1" class="form-label5">وصف المشكلة</label>
   </div>
</div>



<div class="t-work">
  <div class="form-check form-check-inline">
     <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" >
     <label class="form-check-label" for="inlineRadio1">ذكر</label>
   </div>
   <div class="form-check form-check-inline">
     <label class="form-check-label" for="inlineRadio1">انثى </label>
     <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" >
    
   </div>
  </div>
 
  <div class="form-check form-check-inline">
     <label class="form-check-label" for="inlineRadio1">غير محدد </label>
     <input class="form-check-input" type="radio" name="work_period" id="inlineRadio2" value="غير محدد" >
    
   </div>
   <div class="form-check form-check-inline">
     <label class="form-check-label" for="inlineRadio1">نهارية وليلية </label>
     <input class="form-check-input" type="radio" name="work_period" id="inlineRadio2" value="نهارية وليلية" >
    
   </div>
   <div class="form-check form-check-inline">
     <label class="form-check-label" for="inlineRadio1">ليلية </label>
     <input class="form-check-input" type="radio" name="work_period" id="inlineRadio2" value="ليلية" >
    
   </div>
   <div class="form-check form-check-inline">
     <label class="form-check-label" for="inlineRadio1">نهارية </label>
     <input class="form-check-input" type="radio" name="work_period" id="inlineRadio2" value="نهارية" >
    
   </div>



<div class="button">
  <button type="button" class="btn9">إلغاء الأمر</button>
  <button  type="submit"  class="btn10">أنشر الأعلان</button>
</div>
</form>
</div>
@endsection