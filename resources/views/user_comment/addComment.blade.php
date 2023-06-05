@extends('userpage.navbar')

@section('content')
<form action="{{route('user_comment.store')}}"method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <textarea class="form-control" id="commentadd" rows="3" name="com_text" placeholder="اكتب تعليقك"></textarea>
      @error('com_text')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
    @enderror
      </div>

      <div class="comm-foter">
 
        <button type="submit" class="btn btn-secondary" >انشرالتعليق</button>
        <a class="btn btn-primary" href="" role="reset">الغاء الامر</a>
        @foreach ($user_comments as $user_comment)
        <a class="btn btn-primary" href="{{ route('user_comment.editComment', $user_comment->id) }}"
          role="button">تعديل التعليق</a>
        @endforeach
       
 
        
      </div>
</form>



@endsection