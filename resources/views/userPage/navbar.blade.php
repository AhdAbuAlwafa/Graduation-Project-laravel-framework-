<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"href="{{ asset('style/css/style.css?version=1') }}">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('style/plugins/ijabo/ijaboCropTool.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

   
    
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <section>
        
       <nav class="nav1">
        <label id="icon">
            <i class="fas fa-bars"></i>
          </label>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="#">المفضلة</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">المهن</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">اعلانات العمل</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">من نحن</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">الصفحةالرئيسية</a>
              </li>
          </ul>
          
         
       </nav>
        
         
    </section>


    @yield('content')
{{-- 
  <section class="footer">
        <footer class="p-5 text-light text-center position-relative fixed-bottom">
            <div class="container">
                <p class="lead">Copyright &copy; 2023 Call Mehani</p>
            </div>
        </footer>
    </section>

    
   --}}
   
    
    {{-- bootstrab script --}}
   

    
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    
    <script>


$(document).ready(function() {
        $("#Inputsearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            
            $('div[data-role="user"]').each(function() {
                var userName = $(this).find('h3').text().toLowerCase();
                if (userName.indexOf(value) > -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

     
    </script>
<script>
    $(document).ready(function() {
    $('#city_name_select1').on('change', function() {
        var selectedCity = $(this).val();
        if (selectedCity) {
            // Send an Ajax request to get the villages based on the selected city
            $.ajax({
                url: "{{ route('get-villages') }}",
                type: "GET",
                data: { city_name: selectedCity },
                success: function(data) {
                    console.log(data);
                    // Clear the previous options
                    $('#village_name_select1').html('<option value="all">Select Village</option>');
                    // Append new options based on the received data
                    $.each(data, function(key, value) {

                        $('#village_name_select1').append('<option value="' + value.id + '">' + value.village_name + '</option>');
                    });
                },
                
            });
        } else {
            // If no city is selected, clear the villages dropdown
            $('#village_name_select1').html('<option value="all">Select Village</option>');
        }
    });
  });
  </script>
  



<script>
    $(document).ready(function() {
    $('#city_name_select').on('change', function() {
        var selectedCity = $(this).val();
        if (selectedCity) {
            // Send an Ajax request to get the villages based on the selected city
            $.ajax({
                url: "{{ route('get-villages') }}",
                type: "GET",
                data: { city_name: selectedCity },
                success: function(data) {
                    console.log(data);
                    // Clear the previous options
                    $('#village_name_select').html('<option value="all">Select Village</option>');
                    // Append new options based on the received data
                    $.each(data, function(key, value) {

                        $('#village_name_select').append('<option value="' + value.id + '">' + value.village_name + '</option>');
                    });
                },
                
            });
        } else {
            // If no city is selected, clear the villages dropdown
            $('#village_name_select').html('<option value="all">Select Village</option>');
        }
    });
});
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('style/plugins/ijabo/ijaboCropTool.min.js') }}"></scrip>

    <script src="{{ asset('style/js/main.js') }}"></script>

    
      
      
      
      
      
      
    
    @stack('js')

</body>
</html>


