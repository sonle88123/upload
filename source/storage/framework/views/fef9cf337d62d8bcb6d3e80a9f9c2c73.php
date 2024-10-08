<!-- Sidebar -->
<nav class="sidebar" data-trigger="scrollbar">
  <!-- Sidebar Header -->
  <div class="sidebar-header d-none d-lg-block">
      <!-- Sidebar Toggle Pin Button -->
      <div class="sidebar-toogle-pin">
        <i class="icofont-tack-pin"></i>
      </div>
      <!-- End Sidebar Toggle Pin Button -->
  </div>
  <!-- End Sidebar Header -->

  <!-- Sidebar Body -->
  <div class="sidebar-body">
      <!-- Nav -->
      <ul class="nav">
        <li class="nav-category">Main</li>
        <li class="<?php if(isset($menu) && $menu=='overview'): ?> active <?php endif; ?>">
            <a href="<?php echo e(url('/')); ?>/overview">
              <i class="icofont-chart-histogram"></i>
              <span class="link-title">Overview</span>
            </a>
        </li>
        <li class="<?php if(isset($menu) && $menu=='profile'): ?> active sub-menu-opened <?php endif; ?> has-sub-item">
          <a href="#">
            <i class="icofont-queen"></i>
            <span class="link-title">Profile</span>
          </a>

          <!-- Sub Menu -->
          <ul class="nav sub-menu">
            <li class="<?php if(isset($submenu) && $submenu=='profilemanagement'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/profilemanagement">Profile management</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='generateprofile'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/generateprofile">Generate Profile</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='profileschedule'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/profileschedule">Profile schedule</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='profileimporter'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/profileimporter">Profile importer</a></li>
          </ul>
          <!-- End Sub Menu -->
        </li>
        <li class="<?php if(isset($menu) && $menu=='performance'): ?> active sub-menu-opened <?php endif; ?> has-sub-item">
          <a href="#">
            <i class="icofont-chart-histogram-alt"></i>
            <span class="link-title">Performance</span>
          </a>

          <!-- Sub Menu -->
          <ul class="nav sub-menu">
            <li class="<?php if(isset($submenu) && $submenu=='facebook'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/performance/facebook">Facebook</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='instagram'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/performance/instagram">Instagram</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='x'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/performance/x">X (Twitter)</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='threads'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/performance/threads">Threads</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='tiktok'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/performance/tiktok">TikTok</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='youtube'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/performance/youtube">Youtube</a></li>
          </ul>
          <!-- End Sub Menu -->
        </li>
        <li class="<?php if(isset($menu) && $menu=='generativeai'): ?> active sub-menu-opened <?php endif; ?> has-sub-item">
          <a href="#">
            <i class="icofont-bulb-alt"></i>
            <span class="link-title">Generative AI</span>
          </a>

          <!-- Sub Menu -->
          <ul class="nav sub-menu">
            <li class="<?php if(isset($submenu) && $submenu=='socialpost'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/generativeai/socialpost">Social Post</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='socialvideo'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/generativeai/socialvideo">Social Video</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='socialcomment'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/generativeai/socialcomment">Social Comment</a></li>
            <li class="<?php if(isset($submenu) && $submenu=='socialinbox'): ?> active <?php endif; ?>"><a href="<?php echo e(url('/')); ?>/generativeai/socialinbox">Social Inbox</a></li>

          </ul>
          <!-- End Sub Menu -->
        </li>
        <li class="<?php if(isset($menu) && $menu=='content'): ?> active sub-menu-opened <?php endif; ?> has-sub-item">
          <a href="#">
            <i class="icofont-duotone icofont-bar"></i>
            <span class="link-title">NonGenerative AI</span>
          </a>

          <!-- Sub Menu -->
          <ul class="nav sub-menu">
          </ul>
          <!-- End Sub Menu -->
        </li>
      </ul>
      <!-- End Nav -->
  </div>
  <!-- End Sidebar Body -->
</nav>
<!-- End Sidebar --><?php /**PATH D:\xampp\htdocs\kms-main\source\resources\views/parts/sidebar.blade.php ENDPATH**/ ?>