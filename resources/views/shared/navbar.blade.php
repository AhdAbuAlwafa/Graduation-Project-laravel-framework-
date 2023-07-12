<!--<div class="navbar">
    <div class="logo">
        <label>Call Mehani</label>
    </div>
    <nav>
        <ul id='MenuItems'>

            <li><a href='/'> الرئيسية</a></li>

            <li><a href='{{ route('userPage.getAllUser') }}''>المهن</a></li>
            <li><a href='#'>اعلانات العمل</a></li>
            <li><a href='{{ route('who-are-we') }}'>من نحن </a></li>
            <li><a href='{{ route('userPage.userProfile') }}'>حسابي</a></li>
          
           
            @if (auth()->user()!= null)
            <li>
                   <a href="{{ route('logout') }}" onclick="event.preventDefault() ; document.getElementById('logout').submit()" class=" btn nav-btn">تسجيل الخروج</a>
                </li>
                <form action="{{ route('logout') }}" hidden disabled id="logout"  method="post">
                @method('post')
                @csrf
                </form>
            @else
                <li><a href='/login'>تسجيل الدخول</a></li>
            @endif





        </ul>
    </nav>
</div>--->
<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>homepage</title>
	<!-- All CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
	<link href="nav.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarSupportedContent" >
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0" >
                    <a class="navbar-brand"  href="#"><span class="text-warning" >CALL</span >MEHANI</a> <button  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
                   <!----------فراغ اللوجو----->
                    <li class="nav-item">
						<a class="nav-link" style="color: rgb(0, 0, 0);" href='{{ route('userPage.userProfile') }}'></a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" style="color: rgb(0, 0, 0);" href='{{ route('userPage.userProfile') }}'></a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" style="color: rgb(0, 0, 0);" href='{{ route('userPage.userProfile') }}'></a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" style="color: rgb(0, 0, 0);" href='{{ route('userPage.userProfile') }}'></a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" style="color: rgb(0, 0, 0);" href='{{ route('userPage.userProfile') }}'></a>
					</li>
                    
                    <!------------------------------------->
                    @if (auth()->user()!= null)
                    <li class="nav-item" >
                        <a class="nav-link" style="color: rgb(0, 0, 0);" href="{{ route('logout') }}" onclick="event.preventDefault() ; document.getElementById('logout').submit()" class=" btn nav-btn">تسجيل الخروج</a>
                    </li>
                    <form action="{{ route('logout') }}" hidden disabled id="logout"  method="post">
                        @method('post')
                        @csrf
                    </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" style="color: rgb(0, 0, 0);"  href='/login'>تسجيل الدخول</a>
                        </li>
                    @endif
                    <li class="nav-item">
						<a class="nav-link"  style="color: rgb(0, 0, 0);" href='{{ route('who-are-we') }}'>من نحن</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: rgb(0, 0, 0);" href='{{ route('userPage.userProfile') }}'>حسابي</a>
					</li>
                        <li class="nav-item">
                            <a class="nav-link"style="color: rgb(0, 0, 0);" href='{{ route('userPage.getAllUser') }}''>المهن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: rgb(0, 0, 0);" href='#'>اعلانات العمل</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" style="color: rgb(0, 0, 0);" href='/'>الرئيسية</a>
                        </li>
				</ul>
			</div>
            
		</div>
	</nav>
	
	<!-- footer ends -->
	
	<!-- All Js -->
	
</body>
</html>
