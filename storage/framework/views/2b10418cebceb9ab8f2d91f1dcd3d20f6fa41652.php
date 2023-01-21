<div class="page-header">
    <div class="header-wrapper row m-0">        
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid"
                        src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
                <li class="mega-menu outside">
                    <a class="nav-link" href="#!"><i data-feather="layers"></i><span>Dashboard</span></a>
                    <div class="mega-menu-container nav-submenu menu-to-be-close header-mega">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col mega-box">
                                    <div class="mobile-title d-none">
                                        <h5>Mega menu</h5>
                                        <i data-feather="x"></i>
                                    </div>
                                    <div class="link-section icon">
                                        <div>
                                            <h6>Error Page</h6>
                                        </div>
                                        <ul>
                                            <li><a href="<?php echo e(route('error-400')); ?>">Error page 400</a></li>
                                            <li><a href="<?php echo e(route('error-401')); ?>">Error page 401</a></li>
                                            <li><a href="<?php echo e(route('error-403')); ?>">Error page 403</a></li>
                                            <li><a href="<?php echo e(route('error-404')); ?>">Error page 404</a></li>
                                            <li><a href="<?php echo e(route('error-500')); ?>">Error page 500</a></li>
                                            <li><a href="<?php echo e(route('error-503')); ?>">Error page 503</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media">
                        <img class="b-r-10" src="<?php echo e(asset('assets/images/dashboard/profile.jpg')); ?>" alt="">
                        <div class="media-body">
                            <?php if(auth()->guard()->check()): ?>
                            <span><?php echo e(auth()->user()->member_name); ?></span>
                            <?php endif; ?>
                            <p class="mb-0 font-roboto">สมาชิก <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>                 
                        <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                        <li><a href="#"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">                        
      <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
      <div class="ProfileCard-details">
      <div class="ProfileCard-realName">{{name}}</div>
      </div>
      </div>
    </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\travel\resources\views/userLayouts/simple/header.blade.php ENDPATH**/ ?>