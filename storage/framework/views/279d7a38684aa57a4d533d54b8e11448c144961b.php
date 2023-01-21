<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Home - S&P Inter Tour </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="
    <?php echo e(asset('assets_home/css/bootstrap.min.css')); ?>"/>
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/animate.min.css')); ?>" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/fontawesome.all.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- popup css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/popup.css')); ?>" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.carousel.min.css')); ?>" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.theme.default.min.css')); ?>" />
    <!-- navber css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/navber.css')); ?>" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/meanmenu.css')); ?>" />
    <!-- Style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/style.css')); ?>" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/responsive.css')); ?>" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets_home/img/favicon.png')); ?>">
</head>

<body>
 
<?php echo $__env->make('home.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

    <!-- Banner Area -->
    <section id="home_two_banner">
        <div class="home_two_banner_slider_wrapper owl-carousel owl-theme">
         
       
            <div class="banner_two_slider_item fadeInUp" data-wow-duration="2s"
                style="background-image: url(
                    <?php echo e(asset('assets_home/img/banner/banner-two-bg-3.png')); ?>

                    ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="banner_two_text">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Service And Tour Area-->
    <section id="top_service_andtour" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>บริการของเรา</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="top_service_boxed">
                        <img src="<?php echo e(asset('assets_home/img/icon/s3.png')); ?>" width="120px" alt="icon">
                        <h3>จัดอบรมสัมมนา</h3>
                   
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="top_service_boxed">
                        <img src="<?php echo e(asset('assets_home/img/icon/s2.png')); ?>" width="120px"  alt="icon">
                        <h3>ศึกษาดูงาน-นำเที่ยว</h3>
                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="top_service_boxed">
                        <img src="<?php echo e(asset('assets_home/img/icon/s4.png')); ?>" width="120px"  alt="icon">
                        <h3>ปรึกษาวีซ่า/ตั๋วเครื่องบิน</h3>
                    
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="top_service_boxed">
                        <img src="<?php echo e(asset('assets_home/img/icon/s5.png')); ?>" width="120px" alt="icon">
                        <h3>แปลเอกสาร</h3>
                    
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="top_service_boxed">
                        <img src="<?php echo e(asset('assets_home/img/icon/s6.png')); ?>" width="120px"  alt="icon">
                        <h3>ท่องเที่ยวแบบ Home Stay</h3>
                   
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="top_service_boxed">
                        <img src="<?php echo e(asset('assets_home/img/icon/s7.png')); ?>" width="120px"  alt="icon">
                        <h3>ท่องเที่ยวแบบ Long Stay</h3>
                 
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- About Area -->
        <section id="about_two_area" class="section_padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="about_two_left">
                        <div class="about_two_left_top">
                            <h5>About us</h5>
                            <h2>ห้างหุ้นส่วนจำกัด เอส แอนด์ พี อินเตอร์เนชั่นแนลเซอร์วิส</h2>
                            <p>
                            ใบอนุญาตประกอบธุรกิจนำเที่ยว เลขที่ 51/00895
                            </p>
                        </div>
                        <div class="about_two_left_middel">
                            <div class="about_two_item">
                                <div class="about_two_item_icon">
                                    <img src="<?php echo e(asset('assets_home/img/icon/about-1.png')); ?>" alt="icon">
                                </div>
                                <div class="about_two_item_text">
                                    <h3>Package Tour</h3>
                                    <p>รับจัดนำเที่ยว อบรม สัมมนา  ทั้งใน-ต่างประเทศ </p>
                                </div>
                            </div>
                            <div class="about_two_item">
                                <div class="about_two_item_icon">
                                    <img src="<?php echo e(asset('assets_home/img/icon/about-2.png')); ?>" alt="icon">
                                </div>
                                <div class="about_two_item_text">
                                    <h3>Visa Service</h3>
                                    <p>พานักเรียน-นักศึกษาไป Summer ต่างประเทศ </p>
                                </div>
                            </div>
                            <div class="about_two_item">
                                <div class="about_two_item_icon">
                                    <img src="<?php echo e(asset('assets_home/img/icon/about-3.png')); ?>" alt="icon">
                                </div>
                                <div class="about_two_item_text">
                                    <h3>Car Rent</h3>
                                    <p>รถเช่า: รถตู้ VIP รถโค้ชปรับอากาศ มินิบัส </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="about_two_left_img">
                        <img src="<?php echo e(asset('assets_home/img/common/about_two.jpg')); ?>" alt="img">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Holiday Destinations  Area-->
    <section id="holiday_destinations" class="section_padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="holiday_left_heading">
                                <div class="heading_left_area">
                                    <h2>A Warm Welcome & Friendly Service</h2>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="holiday_small_boxed">
                                <a href="top-destinations-details.html">
                                    <img src="<?php echo e(asset('assets_home/img/holiday-img/holiday-1.png')); ?>" alt="img">
                                 
                                </a>
                            </div>
                            <div class="holiday_small_boxed">
                                <a href="top-destinations-details.html">
                                    <img src="<?php echo e(asset('assets_home/img/holiday-img/holiday-2.png')); ?>" alt="img">
                                   
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="holiday_small_boxed">
                                <a href="top-destinations-details.html">
                                    <img src="<?php echo e(asset('assets_home/img/holiday-img/holiday-3.jpg')); ?>" alt="img">                             
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="holiday_small_boxed">
                                <a href="top-destinations-details.html">
                                    <img src="<?php echo e(asset('assets_home/img/holiday-img/holiday-4.jpg')); ?>" alt="img">
                                  
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="holiday_small_boxed">
                                        <a href="top-destinations-details.html">
                                            <img src="<?php echo e(asset('assets_home/img/holiday-img/holiday-5.jpg')); ?>" alt="img">
                                          
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="holiday_small_boxed">
                                        <a href="top-destinations-details.html">
                                            <img src="<?php echo e(asset('assets_home/img/holiday-img/holiday-6.jpg')); ?>" alt="img">
                                          
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="copyright_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>Copyright © 
                        <?php echo date("Y"); ?> All Rights Reserved</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="<?php echo e(asset('assets_home/img/common/cards.png')); ?>" width="100px" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="<?php echo e(asset('assets_home/js/jquery-3.6.0.min.js')); ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('assets_home/js/bootstrap.bundle.js')); ?>"></script>
    <!-- Meanu js -->
    <script src="<?php echo e(asset('assets_home/js/jquery.magnific-popup.min.js')); ?>"></script>
    <!-- Meanu js -->
    <script src="<?php echo e(asset('assets_home/js/jquery.meanmenu.js')); ?>"></script>
    <!-- owl carousel js -->
    <script src="<?php echo e(asset('assets_home/js/owl.carousel.min.js')); ?>"></script>
    <!-- wow.js -->
    <script src="<?php echo e(asset('assets_home/js/wow.min.js')); ?>"></script>
    <!-- Custom js -->
    <script src="<?php echo e(asset('assets_home/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets_home/js/add-form.js')); ?>"></script>
    <script src="<?php echo e(asset('assets_home/js/video.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\travel\resources\views/home/index.blade.php ENDPATH**/ ?>