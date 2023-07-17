@extends('userPage.navbar')
@section('content')

<form method="GET" action="{{ route('userPage.advertisements') }}">
    @csrf

    <div class="form-group">
        <label for="craft_name">Choose a Craft:</label>
        <select class="form-control" id="craft_name" name="craft_name">
            <option value="all">All Crafts</option>
            @foreach ($crafts as $craft)
                <option value="{{ $craft->craft_name }}" {{ $selectedCraft == $craft->craft_name ? 'selected' : '' }}>
                    {{ $craft->craft_name }}
                </option>
            @endforeach
        </select>
    </div>

    <select id="city_name_select" name="city_name">
    <option value="all">Select City</option>
    @foreach($cities as $cityName)
        <option value="{{ $cityName }}">
            {{ $cityName }}
        </option>
        <?php Log::info("City: " . $cityName); ?>
    @endforeach</select>


<select id="village_name_select" name="village_name">
    <option value="all">Select Village</option>
</select>


    <button type="submit" class="btn btn-primary">Search</button>
</form>

@if ($advertisements->count() > 0)
    <div class="container mt-4">
        <div class="row">
            @foreach ($advertisements as $advertisement)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">{{ $advertisement->job_name }}</h5>
                            <p class="card-text">{{ $advertisement->job_des }}</p>
                            <p class="card-text">City: {{ optional($advertisement->addresses)->city_name }}</p>
                            <p class="card-text">village: {{ optional($advertisement->addresses)->village_name }}</p>
                            <p class="card-text">Work Hours: {{ $advertisement->work_hour }}</p>
                            <p class="card-text">advertisement_type: {{ $advertisement->advertisement_type }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{ $advertisements->links()}}
@else
    <p>No advertisements found.</p>
@endif

@endsection
