<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <!-- Logo -->
            <div class="header-left">
                <div class="logo">
                    <a href="index.html"><img src="home/assets/img/logo/logo.png" alt=""></a>
                </div>
                <div class="menu-wrapper  d-flex align-items-center">
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                {{-- <li><a href="blog.html">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog_details.html">Blog Details</a></li>
                                        <li><a href="elements.html">Element</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="header-right d-none d-lg-block">
            @if (Route::has('login'))
                @auth
                    <x-app-layout>

                    </x-app-layout>
                @else
                    <a class="header-btn2" id="logincss" href="{{ route('login') }}">Get Started</a>
                    {{-- <a class="btn btn-warning" href="">Register</a> --}}
                    {{-- <a href="#" class="header-btn1"><img src="home/assets/img/icon/call.png" alt=""> (08) 728 256 266</a>
                <a href="#" class="header-btn2">Make an Appointment</a> --}}
                @endauth
            @endif
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
