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
                            <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login.show')); ?>">เข้าสู่ระบบ</a></li>
                            <li><a href="<?php echo e(route('register.show')); ?>">สมัครสมาชิก</a></li>
                            <?php endif; ?>

                            <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('userPages.home')); ?>"><?php echo e(auth()->user()->username); ?></a></li> 
                            <li><a href="<?php echo e(route('logout.perform')); ?>">ออกจากระบบ</a></li>                           
                            <?php endif; ?>                           
                                                
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

                            <?php if(auth()->guard()->guest()): ?>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="<?php echo e(route('register.show')); ?>" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(auth()->guard()->check()): ?>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="<?php echo e(route('userPages.home')); ?>" class="btn  btn_navber">หน้าสมาชิก</a>
                                </div>
                            </div>
                            <?php endif; ?>
                    

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
                                <?php if(auth()->guard()->guest()): ?>
                                <div class="option-item">
                                    <a href="<?php echo e(route('login.show')); ?>" class="btn  btn_navber">เข้าสู่ระบบ</a>
                                </div>
                                <div class="option-item">
                                    <a href="<?php echo e(route('register.show')); ?>" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                                <?php endif; ?>                                
                            <?php if(auth()->guard()->check()): ?>
                            <div class="option-item">
                                <a href="<?php echo e(route('userPages.home')); ?>" class="btn  btn_navber">หน้าสมาชิก</a>
                            </div>
                            <?php endif; ?>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </header><?php /**PATH C:\xampp\htdocs\travel\resources\views/home/menu.blade.php ENDPATH**/ ?>