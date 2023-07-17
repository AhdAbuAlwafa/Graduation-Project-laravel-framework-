@extends('userPage.navbar')
@section('content')

<section>

<!-- workAlone Ads Section -->
    <h2>workAlone Ads</h2>
   
            @foreach ($workAloneAds as $index => $ad)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->job_name }}</h5>
                            <p class="card-text">{{ $ad->job_des }}</p>
                            <p class="card-text">City: {{ optional($ad->addresses)->city_name }}</p>
                            <p class="card-text">Village: {{ optional($ad->addresses)->village_name }}</p>
                            <p class="card-text">Work Hours: {{ $ad->work_hour }}</p>
                        </div>
                    </div>
            @endforeach
       
    <a href="{{ route('userPage.advertisements', ['advertisement_type' => 'workAlone']) }}" class="btn btn-primary mt-3">Click to show all workAlone Ads</a>
</section>

<section>

    <!-- Workshop Ads Section -->
    <h2>Workshop Ads</h2>
            @foreach ($workshopAds as $index => $ad)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->job_name }}</h5>
                            <p class="card-text">{{ $ad->job_des }}</p>
                            <p class="card-text">City: {{ optional($ad->addresses)->city_name }}</p>
                            <p class="card-text">Village: {{ optional($ad->addresses)->village_name }}</p>
                            <p class="card-text">Work Hours: {{ $ad->work_hour }}</p>
                        </div>
                    </div>
            @endforeach

        
    <a href="{{ route('userPage.advertisements', ['advertisement_type' => 'workshops']) }}" class="btn btn-primary mt-3">Click to show all Workshop Ads</a>
</section>

@endsection