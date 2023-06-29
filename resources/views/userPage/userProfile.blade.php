@extends('userPage.navbar')
@section('content')


<section class="py-5 my-5">
		<div class="container">

			<h1 class="mb-5">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex float-right">


				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">

							<img src="{{'images/'.auth()->user()->image}}" alt="Image" class="shadow" id="profileImg">
						</div>
            <div>
                <form action="{{route('uploadimg')}}" method="post" id="imgform">
                    @method('post')
                    @csrf
                    <input type="file" name="image" hidden id="ipt" accept="image/png, image/gif, image/jpeg , image/svg , image/jpg">
                    <button  href="" id="btn" class="btn btn-primary" disabled >Change profile photo</button>
                </form>


               </div>

            <div>

                <i class="fa-thin fa-star"></i>
                <i class="fa-thin fa-star"></i>
                <i class="fa-thin fa-star"></i>
                <i class="fa-thin fa-star"></i>
                <i class="fa-thin fa-star"></i>
            </div>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i>
							 المعلومات الشخصية
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i>
							كلمة السر
						</a>
						<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fa fa-user text-center mr-1"></i>
												     تنشيط الحساب

						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-tv text-center mr-1"></i>
              الاعلانات
						</a>
                        <a class="nav-link" id="tah-tab" data-toggle="pill" href="#tah" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-tv text-center mr-1"></i>
              تحويل الحساب
						</a>

					</div>
				</div>

				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <form action="{{ route('userPage.update') }}"method="POST" enctype="multipart/form-data">
                        @csrf
                    @method('PATCH')

					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h3 class="mb-4">تعديل المعلومات الشخصية</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم الاول</label>
                                    <input type="text" class="form-control"  name="fname" value="{{ $user->fname }}">
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
                                    <input type="text" class="form-control"  name="lname" value="{{ $user->lname }}">
                                      @error('lname')
                                      <div class="text-red-500 mt-2 text-sm">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="text" class="form-control" name="number" value="{{ $user->number }}">
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

                        <select class="form-control form-select mt-3" aria-label="Default select example" id="city_name"  name="city_name">

                        @foreach ($cities as $id => $name)
                      <option value="{{ $name }}" {{ $user->addresses->city_name == $name ? 'selected' : '' }}>
                       {{ $name }}
                   </option>
                    @endforeach
                    </select>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>القرية</label>
                    <select class="form-control form-select mt-3" aria-label="Default select example" id="village_name" name="village_name">
                        @foreach ($village as $id => $name)
                      <option value="{{ $name }}" {{ $user->addresses->village_name == $name ? 'selected' : '' }}>
                       {{ $name }}
                   </option>
                   @endforeach
                    </select>

                                </div>
                            </div>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">تحديث</button>
                            <button class="btn btn-light">الغاء</button>
                        </div>
                    </div>



						<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
							<h3 class="mb-4">اعدادات كلمة السر</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										  <label>كلمةالسر القديمة</label>
										  <input type="text" class="form-control " name="current_password" value="">
										  @error('current_password')
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
										  <label>كلمة السر الجديدة</label>
										  <input type="password" class="form-control" name="new_password">
										  @error('new_password')
										  <div class="text-red-500 mt-2 text-sm">
											  {{ $message }}
										  </div>
										  @enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										  <label>تاكيد كلمة السر الجديدة</label>
										  <input type="password" class="form-control" name="new_password_confirmation">
										  @error('new_password_confirmation')
										  <div class="text-red-500 mt-2 text-sm">
											  {{ $message }}
										  </div>
										  @enderror
									</div>
								</div>
							</div>
							<div>
								<button type="submit" class="btn btn-primary">تحديث</button>
								<button class="btn btn-light">الغاء</button>
							</div>
						</div>
					</form>

					<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">

            <h3 class="mb-4">الغاء تنشيط حسابك</h3>

            <p>إذا كنت تريد التوقف عن استخدام الموقع مؤقتًا، يمكنك إلغاء تنشيط حسابك.</p>
						<div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="status" name="status">
              <label class="form-check-label" for="status"></label> الغاء الحساب</label>
            </div>


					</div>
					<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
            <h3 class="mb-4">اعلاناتي</h3>

						<div class="row">

                        </div>
					</div>


                    <div class="tab-pane fade" id="tah" role="tabpanel" aria-labelledby="tah-tab">

                        <h3 class="mb-4">تحويل الحساب </h3>

                        <p>يمكنك تحويل حسابك من مستخدم عادي يستفيد من الخدمات التي يوفرها الموقع فقط.الى حساب مهني يستطيع استقبال طلبات العمل</p>


                       <div class="col-md-6">
                        <div class="form-group">
                              <label>المهنة</label>

                              <select class="form-select" multiple aria-label="multiple select example" value="">
                                <option selected>يمكنك اختيار اكثر من مهنة </option>

                              </select>


                        </div>
                       </div>
                       <div class="col-md-12">
                        <div class="form-group">
                              <label>وصف المهنة</label>
                            <textarea class="form-control" rows="4" value=" "></textarea>
                        </div>
                    </div>
                    </div>




				</form>
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
   $(function(){
    $('#btn').removeAttr('disabled')
    $('#imgform').on('submit',function(e){
        e.preventDefault()

        if($('#btn').text() == 'Change profile photo'){
            $('#ipt').click()
            $('#ipt').on('change',function(){
            $('#btn').text('Upload photo')
         })

        }else{
            $.ajax({
                url:$(this).attr('action'),
                    method:$(this).attr('method'),
                    data: new FormData(this),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforSend:function(){

                    },
                    success:function(data){
                        if(data.status == 0 ){
                            $.each(data.error,function(prefix,val){
                                console.log(val[0]);
                            });
                        }else if(data.status==1){
                            $('#imgform')[0].reset[0]
                            $('#btn').text('Change profile photo')
                            $( "#profileImg" ).attr('src','images/'+data.imgname);
                            console.log('success');

                        }
                    }
            })
        }

    })

})
	</script>
