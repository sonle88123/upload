<!-- Header -->
<header class="header white-bg fixed-top d-flex align-content-center flex-wrap">
  <div class="mobile-header">
    <!-- Main Header Menu -->
    <div class="main-header-menu d-block d-lg-none">
      <div class="header-toogle-menu">
        <!-- <i class="icofont-navigation-menu"></i> -->
        <img src="<?php echo e(url('/')); ?>/img/menu.png" alt="">
      </div>
    </div>
    <!-- End Main Header Menu -->
  </div>

  <!-- Logo -->
  <div class="logo">
    <a href="<?php echo e(url('/')); ?>/overview" class="default-logo"><img src="<?php echo e(url('/')); ?>/img/trenditagline900.png" alt=""></a>
    <a href="<?php echo e(url('/')); ?>/overview" class="mobile-logo"><img src="<?php echo e(url('/')); ?>/img/trenditagline900.png" alt=""></a>
  </div>
  <!-- End Logo -->

  <!-- Main Header -->
  <div class="main-header">
    <div class="container-fluid">
        <div class="row justify-content-between">
          <div class="col-3 col-lg-1 col-xl-4">
              <!-- Header Left -->
              <div class="main-header-left h-100 d-flex align-items-center">
                <!-- Main Header User -->
                <div class="main-header-user">
                    <div class="user-profile d-xl-flex align-items-center d-none">
                      <!-- User Info -->
                      <div class="user-info">
                        <?php if(Auth::user()): ?>
                        <h4 class="user-name"><?php echo e(Auth::user()->fullname); ?></h4>
                        <p class="user-email"><?php echo e(Auth::user()->email); ?></p>
                        <?php endif; ?>
      
                      </div>
                      <!-- End User Info -->
                    </div>
                </div>
                <!-- End Main Header User -->
              </div>
              <!-- End Header Left -->
          </div>
          <div class="col-9 col-lg-11 col-xl-8">
              <!-- Header Right -->
              <div class="main-header-right d-flex justify-content-end">
                <ul class="nav">
                  <li class="d-none d-lg-flex">
                    <!-- Facebook connect -->
                    <div class="main-header-social-connect facebook">
                      <div id="fb-root"></div>
                      <button onclick="checkLoginState();" class="header-icon">
                        <i class="icofont-facebook"></i> Facebook Connect
                      </button>
                    </div>
                    <!-- End Facebook connect -->
                  </li>
                  <li class="d-none d-lg-flex">
                    <!-- Main Header Time -->
                    <div class="main-header-date-time text-right">
                        <h3 class="time">
                          <span id="hours">21</span>
                          <span id="point">:</span>
                          <span id="min">06</span>
                        </h3>
                        <span class="date"><span id="date">Tue, 12 October 2019</span></span>
                    </div>
                    <!-- End Main Header Time -->
                  </li>
                  <li>
                    <!-- Main Header Messages -->
                    <div class="main-header-message">
                        <a href="<?php echo e(url('/')); ?>/logout" class="header-icon">
                          <i class="icofont-duotone icofont-exit"></i>
                        </a>
                    </div>
                    <!-- End Main Header Messages -->
                  </li>
                </ul>
              </div>
              <!-- End Header Right -->
          </div>
        </div>
    </div>
  </div>
  <!-- End Main Header -->
</header>
<!-- End Header --><?php /**PATH D:\xampp\htdocs\kms-main\source\resources\views/parts/header.blade.php ENDPATH**/ ?>