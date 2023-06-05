@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>

@endif


@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-error">
            {{ $error }}
        </div>
    @endforeach
@endif