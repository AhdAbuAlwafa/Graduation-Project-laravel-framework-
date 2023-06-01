<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container text-center my-5">
        <div class="user my-3">
            <i class="fas fa-user-secret user-icon"></i>
            <h4 class="login">Login</h4>
        </div>
        <div class="card p-5 w-50 m-auto">
            <form method="POST" action="/handleLogin">
                <input class="form-control" placeholder="Enter your email" type="text" name="email">
                <input class="form-control my-4 " placeholder="Enter your Password" type="text" name="password">
                <button class="btn btn-default-outline my-4 w-100 rounded">Login</button>
                <p><a class="text-muted forgot btn" href="">I Forgot My Password</a></p>
                <a class="btn btn-default-outline" href="register.html">Register</a>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl-js"></script>


</html>