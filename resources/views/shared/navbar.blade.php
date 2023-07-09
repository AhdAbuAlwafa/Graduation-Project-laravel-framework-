<div class="navbar">
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


            @if (auth()->user())
                <li><a href=' #'>تسجيل خروج</a></li>
            @else
                <li><a href='/login'>تسجيل الدخول</a></li>
            @endif





        </ul>
    </nav>
</div>
