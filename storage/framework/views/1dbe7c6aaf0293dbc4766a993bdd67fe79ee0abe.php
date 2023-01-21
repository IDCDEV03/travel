 <!-- Header Area -->
 <header class="main_header_arae">
        <!-- Top Bar -->
        <div class="topbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-list">
                            <li>
                                <a href="#!"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                            <a href="#!"><i class="fab fa-line"></i> K.Mori</a></li>
                            <li><a href="#!">โทร.
                            <span>
                            093-545-9009, 082-493-2644</span></a></li>
                            <li><a href="#!"><span>sp.tour.ud@gmail.com</span></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-others-options">
                            <li><a href="<?php echo e(route('login.show')); ?>">เข้าสู่ระบบ</a></li>
                            <li><a href="<?php echo e(route('register.show')); ?>">สมัครสมาชิก</a></li>
                            <li>                               
                            </li>                         
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
                            <a href="<?php echo e(route('/')); ?>">
                                <img src="<?php echo e(asset('assets_home/img/logo.png')); ?>" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?php echo e(route('/')); ?>">
                            <img src="<?php echo e(asset('assets_home/img/logo.png')); ?>" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('/')); ?>" class="nav-link active">
                                        หน้าหลัก  
                                    </a>                                    
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('about_us.show')); ?>" class="nav-link">
                                        เกี่ยวกับเรา    
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('service.show')); ?>" class="nav-link">
                                        บริการของเรา            
                                    </a>
                                </li>
                           
                                <li class="nav-item">
                                    <a href="<?php echo e(route('contact.show')); ?>" class="nav-link">ติดต่อเรา</a>
                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="#" class="search-box">
                                        <i class="bi bi-search"></i></a>
                                </div>
                                <div class="option-item">
                                    <a href="<?php echo e(route('register.show')); ?>" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                            </div>
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
                                <div class="option-item">
                                    <a href="#" class="search-box"><i class="fas fa-search"></i></a>
                                </div>
                                <div class="option-item">
                                    <a href="<?php echo e(route('register.show')); ?>" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

     <!-- search -->
     <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\travel\resources\views/home/menu.blade.php ENDPATH**/ ?>