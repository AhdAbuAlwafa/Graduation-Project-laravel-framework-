<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>من نحن</title>
    <link href="{{ asset('assets/css/about-us.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
</head>

<body>
    <!----------------navbar------------------->
    @include('shared.navbar')
    <!----------------start of heading--------------->
    <div class="heading">
        <h1>من نحن</h1>
    </div>
    <!------------------end of heading------------------>
    <!----------------start of container--------------->
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="assets/img/whoWeImg.jpg">
            </div>
            <div class="about-content">
                <h2> Call Mehani</h2>
                <p>
                    يتيح لك موقعنا سهولة البحث عن عماله في كافة المهن ومختلف المدن من خلال إختيار المهنه المتاحه والحصول على رقم العامل في منطقتك او القريب منك فأختصر وقتك وجهدك لتنفيذ عملك



                </p>
            </div>
        </section>
    </div>
</body>

</html>