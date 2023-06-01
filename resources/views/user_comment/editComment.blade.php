@extends('userpage.navbar')

@section('content')
<form action="{{ route('user_comment.update', $user_comments->id)}}"method="post">
    @csrf
    @method('PATCH')
    
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <textarea class="form-control" id="commentadd" rows="3" name="com_text" placeholder="اكتب تعليقك"  value="{{ $user_comments->com_text }}"></textarea>
        @error('com_text')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
    @enderror
      </div>

      <div class="comm-foter">
 
        <button type="submit" class="btn btn-secondary" >تعديل التعليق</button>
        <a class="btn btn-primary" href="" role="reset">الغاء الامر</a>
        
        
      </div>
</form>



@endsection