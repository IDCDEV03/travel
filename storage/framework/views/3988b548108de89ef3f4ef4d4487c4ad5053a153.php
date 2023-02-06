<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>โปรแกรมทัวร์ : S&P Inter Tour</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/bootstrap.min.css')); ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/animate.min.css')); ?>">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/fontawesome.all.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <!-- Slick css -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_home/css/slick.min.css')); ?>" />
        <!--slick-theme.css-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_home/css/slick-theme.min.css')); ?>" />
        <!-- Rangeslider css -->
        <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/nouislider.css')); ?>" />
    <!-- popup css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/popup.css')); ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.carousel.min.css')); ?>">
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.theme.default.min.css')); ?>">
    <!-- navber css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/navber.css')); ?>">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/meanmenu.css')); ?>">
    <!-- Style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/style.css')); ?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/responsive.css')); ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets_home/img/favicon.png')); ?>">
</head>

<body>
    <!-- preloader Area -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area -->

    <?php echo $__env->make('home.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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

    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>โปรแกรมทัวร์ของเรา</h2>                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $__currentLoopData = $package_tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Tour Search Areas -->
    <section id="tour_details_main" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tour_details_leftside_wrapper">
                        <div class="tour_details_heading_wrapper">
                            <div class="tour_details_top_heading">
                                <h2><?php echo e($item->package_name); ?></h2>
                                <h5><i class="fas fa-map-marker-alt"></i> <?php echo e($item->package_place); ?></h5>
                            </div>

                        </div>
                        <div class="tour_details_top_bottom">
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>ระยะเวลา</h5>
                                    <p><?php echo e($item->package_total_day); ?></p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>ราคา</h5>
                                    <p><?php echo e(number_format($item->package_price)); ?> บาท/ท่าน</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>จำนวนรองรับ</h5>
                                    <p><?php echo e($item->package_min_customer); ?> คน</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-map-marked"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>สถานที่</h5>
                                    <p><?php echo e($item->package_place); ?></p>
                                </div>
                            </div>
                        </div>
                      

                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">ไฮไลท์</h3>
                            <div class="tour_details_boxed_inner">
                                <?php echo e($item->highlight_tour); ?>


                            </div>
                        </div>

                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">รายละเอียด</h3>
                            <div class="tour_details_boxed_inner">
                               <?php echo $item->package_detail; ?>

                            </div>
                        </div>

                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">เงื่อนไขยกเลิกการจอง</h3>
                            <div class="tour_details_boxed_inner">
                                <ul>
                                    <li><i class="fas fa-circle"></i>เนื่องจากยกเลิกก่อนการเดินทางตั้งแต่ 30 วันขึ้นไป คืนเงินค่าทัวร์โดยหักค่าใช้จ่ายที่เกิดขึ้นจริง 
                                        ในกรณีที่วันเดินทางตรงกับวันหยุดนักขัตฤกษ์ ต้องยกเลิกก่อน 45 วัน</li>
                                    <li><i class="fas fa-circle"></i>	ยกเลิกก่อนการเดินทาง 15-29 วัน คืนเงิน 50% ของค่าทัวร์ หรือหักค่าใช้จ่ายตามจริง เช่น ค่ามัดจำตั๋วเครื่องบิน โรงแรม และค่าใช้จ่ายจำเป็นอื่นๆ
                                    </li>
                                    <li><i class="fas fa-circle"></i>ยกเลิกก่อนการเดินทางน้อยกว่า 15 วัน ขอสงวนสิทธิ์ไม่คืนเงินค่าทัวร์ที่ชำระแล้วทั้งหมด</li>
                                    <li><i class="fas fa-circle"></i>หากมีการยกเลิกการเดินทางโดยไม่ใช่ความผิดของบริษัททัวร์ ทางบริษัทขอสงวนสิทธิ์ไม่รับผิดชอบ และ คืนค่าทัวร์ส่วนใดส่วนหนึ่งให้ท่านได้ไม่ว่ากรณีใดๆทั้งสิ้น เช่น สถานทูตปฏิเสธวีซ่า ด่านตรวจคนเข้าเมือง นโยบายห้ามเข้าออกประเทศฯลฯ
                                    </li>
                                    <li><i class="fas fa-circle"></i>
                                        กรณีต้องการเปลี่ยนแปลงผู้เดินทาง (เปลี่ยนชื่อ) จะต้องแจ้งให้ทางบริษัททราบล่วงหน้า อย่างน้อย 21 วัน ก่อนออกเดินทาง กรณีแจ้งหลังจากเจ้าหน้าที่ออกเอกสารเรียบร้อยแล้ว ไม่ว่าส่วนใดส่วนหนึ่ง ทางบริษัทขอสงวนสิทธิ์ในการเรียกเก็บค่าใช้จ่ายที่เกิดขึ้นจริงทั้งหมด ทั้งนี้ขึ้นอยู่กับช่วงพีเรียดวันที่เดินทาง และกระบวนการของแต่ละคณะ เป็นสำคัญด้วย กรุณาสอบถามกับเจ้าหน้าที่เป็นกรณีพิเศษ
                                    </li>
                                    <li><i class="fas fa-circle"></i>กรณีต้องการเปลี่ยนแปลงพีเรียดวันเดินทาง (เลื่อนวันเดินทาง) ทางบริษัทขอสงวนสิทธิ์ในการหักค่าใช้จ่ายการดำเนินการต่างๆ ที่เกิดขึ้นจริงสำหรับการดำเนินการจองครั้งแรก ตามจำนวนครั้งที่เปลี่ยนแปลง ไม่ว่ากรณีใดๆทั้งสิ้น</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="tour_details_right_sidebar_wrapper">
                        <div class="tour_detail_right_sidebar">
                            <div class="tour_details_right_boxed">
                                <div class="tour_guides_boxed">
                                <img src="<?php echo e(asset($item->package_cover)); ?>" alt="img">
                                </div>
                            </div>
                        </div>

                        <div class="tour_detail_right_sidebar">
                            <div class="tour_details_right_boxed">
                                <div class="tour_details_right_box_heading">
                                    <h3>พรีเรียดวันเดินทาง</h3>
                                </div>
                                <div class="valid_date_area">
                                    <div class="valid_date_area_one">
                                        <h5>เริ่ม</h5>
                                        <p> <?php echo e(Carbon\Carbon::parse($item->package_period_start)->format('d M Y')); ?></p>
                                    </div>
                                    <div class="valid_date_area_one">
                                        <h5>ถึง</h5>
                                        <p> <?php echo e(Carbon\Carbon::parse($item->package_period_end)->format('d M Y')); ?></p>
                                    </div>
                                </div>                               
                                <div class="tour_package_details_bar_price">
                                    <h5>ราคา</h5>
                                    <div class="tour_package_bar_price">
                              
                                        <h3><?php echo e(number_format($item->package_price)); ?> บาท <sub>/ท่าน</sub> </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="tour_select_offer_bar_bottom">
                                <button class="btn btn_theme btn_md w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">สนใจจองแพ็คเกจ</button>
                            </div>
                        </div>                      

                    </div>
                </div>
            </div>
        </div>

    </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    <div class="copyright_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>Copyright © <?php echo date('Y'); ?> All Rights Reserved</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="<?php echo e(asset('assets_home/img/logo-mini.png')); ?>" alt="img">
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
     <!-- Slick js -->
     <script src="<?php echo e(asset('assets_home/js/slick.min.js')); ?>"></script>
     <script src="<?php echo e(asset('assets_home/js/slick-slider.js')); ?>"></script>
    <!-- Meanu js -->
    <script src="<?php echo e(asset('assets_home/js/jquery.meanmenu.js')); ?>"></script>
    <!-- owl carousel js -->
    <script src="<?php echo e(asset('assets_home/js/owl.carousel.min.js')); ?>"></script>
    <!-- wow.js -->
    <script src="<?php echo e(asset('assets_home/js/wow.min.js')); ?>"></script>
    <!-- Custom js -->
    <script src="<?php echo e(asset('assets_home/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets_home/js/add-form.js')); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\travel\resources\views/home/tour-details.blade.php ENDPATH**/ ?>