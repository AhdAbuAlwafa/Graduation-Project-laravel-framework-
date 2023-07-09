@extends('layouts.master')

@section('content')
    <div class="container">
           
        <form action="{{ route('crafts.add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">صورة تدل على المهنة</label>

                <input type="file" class="form-control" id="image_path" name="image_path">

                @error('image_path')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">اسم المهنة</label>
                <input type="longText" class="form-control" id="description" name="craft_name">

                @error('craft_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a class="btn btn-primary" href="{{ route('crafts.list') }}" role="button">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
@endsection
