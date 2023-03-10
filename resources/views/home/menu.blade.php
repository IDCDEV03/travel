 <!-- Header Area -->
 <header class="main_header_arae">
        <!-- Top Bar -->
        <div class="topbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-list">
                            <li>
                           <i class="fab fa-line"></i> K.Mori</li>
                            <li>โทร.
                            <span>
                            093-545-9009, 082-493-2644</span></li>
                            <li><span>sp.tour.ud@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-others-options">
                            @guest
                            <li><a href="{{ route('login.show') }}">เข้าสู่ระบบ</a></li>
                            <li><a href="{{ route('register.show') }}">สมัครสมาชิก</a></li>
                            @endguest

                            @auth
                            <li><a href="{{route('userPages.home')}}">{{auth()->user()->username}}</a></li> 
                            <li><a href="{{ route('logout.perform') }}">ออกจากระบบ</a></li>                           
                            @endauth                           
                                                
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar Bar -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="{{ route('/') }}">
                                <img src="{{asset('assets_home/img/logo.png')}}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('/') }}">
                            <img src="{{asset('assets_home/img/logo.png')}}" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('/') }}" class="nav-link active">
                                        หน้าหลัก  
                                    </a>                                    
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about_us.show') }}" class="nav-link">
                                        เกี่ยวกับเรา    
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('service.show') }}" class="nav-link">
                                        บริการของเรา            
                                    </a>
                                </li>
                           
                                <li class="nav-item">
                                    <a href="{{ route('contact.show') }}" class="nav-link">ติดต่อเรา</a>
                                </li>
                            </ul>

                            @guest
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="{{ route('register.show') }}" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                            </div>
                            @endguest

                            @auth
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="{{ route('userPages.home') }}" class="btn  btn_navber">หน้าสมาชิก</a>
                                </div>
                            </div>
                            @endauth
                    

                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                         
                            <div class="others-options d-flex align-items-center">
                                @guest
                                <div class="option-item">
                                    <a href="{{ route('login.show') }}" class="btn  btn_navber">เข้าสู่ระบบ</a>
                                </div>
                                <div class="option-item">
                                    <a href="{{ route('register.show') }}" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                                @endguest                                
                            @auth
                            <div class="option-item">
                                <a href="{{ route('userPages.home') }}" class="btn  btn_navber">หน้าสมาชิก</a>
                            </div>
                            @endauth
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </header>