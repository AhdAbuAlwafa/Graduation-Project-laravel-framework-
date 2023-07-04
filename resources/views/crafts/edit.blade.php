@extends('layouts.master')

@section('content')
    <div class="container">

        <form action="{{ route('crafts.update', $craft->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label"> New craft_name</label>
                <input type="longText" class="form-control" id="description" name="craft_name"
                    value="{{ $craft->craft_name }}">

                @error('craft_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label"> New screenshot of project</label>
                
                <input type="file" class="form-control" id="image" name="image_path" value="{{ $craft->image_path }} ">

                @error('image_path')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-primary" href="{{ route('crafts.list') }}" role="button">Back</a>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
