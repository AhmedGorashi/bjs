<header>
    <!-- Header Start -->
   <div class="header-area header-transparrent">
       <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('site_files/assets/img/logo/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{route('site.home')}}">Home</a></li>
                                        <li><a href="{{route('site.profile')}}">Profile</a></li>
                                        <li><a href="{{route('site.jobs')}}">Find a Jobs </a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="#">Blog Details</a></li>
                                                <li><a href="#">Elements</a></li>
                                                <li><a href="#">job Details</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @if(!isset(auth()->user()->id))
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{url('register')}}" class="btn head-btn1">Register</a>
                                <a href="{{url('login')}}" class="btn head-btn2">Login</a>
                            </div>
                            @else
                            <div class="header-btn d-none f-right d-lg-block">
                                <a class="btn head-btn1" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
       </div>
   </div>
    <!-- Header End -->
</header>
