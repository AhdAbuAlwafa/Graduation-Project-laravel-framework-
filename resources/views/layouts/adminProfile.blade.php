@extends('layouts.master')

@section('content')
<div class="container"> 
    <div class="card shadow mb-4">
        <div class="form-group row">
            <h3 class="mb-4">تعديل معلوماتك الشخصية</h3>
                          <label for="inputName" class="col-sm-2 col-form-label">رقم الهاتف</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="	" value="" name="number	">
                            <span class="text-danger error-text number_error"></span>
                          </div>
                        </div>

    </div>
    



</div>
    


@endsection
