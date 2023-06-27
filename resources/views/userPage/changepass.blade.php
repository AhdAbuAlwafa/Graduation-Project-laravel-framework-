@extends('userPage.navbar')
@section('content')
<form action="{{route('userPage.changePassword')}}" method="post">
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


    <label for="old">old</label>
    <input type="password" name="old">
    <label for="password">new</label>
    <input type="password" name="password">
    <label for="password_confirmation">confirm</label>
    <input type="password" name="password_confirmation">
    <button type="submit">submit</button>
</form>

@endsection