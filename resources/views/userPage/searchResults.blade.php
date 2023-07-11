@extends('userPage.navbar')
@section('content')
@if($users->count() > 0)
  <div class="container containerBody row g-4 text-center" id="containerBody">
    @foreach($users as $user)
      <div class="col-md-6 col-lg-3" data-role="user">
        <!-- Display user information here -->
      </div>
    @endforeach
  </div>

  {{ $users->links() }}
@else
  <div class="col">
    <div class="alert alert-danger" role="alert">
      No workers
    </div>
  </div>
@endif

@endsection
