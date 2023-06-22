<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"href="{{ asset('style/css/style.css?version=1') }}">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('style/js/main.js') }}"></script>

    @stack('js')

</body>
</html>


