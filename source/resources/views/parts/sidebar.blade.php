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
        <li class="@if(isset($menu) && $menu=='overview') active @endif">
            <a href="{{url('/')}}/overview">
              <i class="icofont-chart-histogram"></i>
              <span class="link-title">Overview</span>
            </a>
        </li>
        <li class="@if(isset($menu) && $menu=='profile') active sub-menu-opened @endif has-sub-item">
          <a href="#">
            <i class="icofont-queen"></i>
            <span class="link-title">Profile</span>
          </a>

          <!-- Sub Menu -->
          <ul class="nav sub-menu">
            <li class="@if(isset($submenu) && $submenu=='profilemanagement') active @endif"><a href="{{url('/')}}/profilemanagement">Profile management</a></li>
            <li class="@if(isset($submenu) && $submenu=='generateprofile') active @endif"><a href="{{url('/')}}/generateprofile">Generate Profile</a></li>
            <li class="@if(isset($submenu) && $submenu=='profileschedule') active @endif"><a href="{{url('/')}}/profileschedule">Profile schedule</a></li>
            <li class="@if(isset($submenu) && $submenu=='profileimporter') active @endif"><a href="{{url('/')}}/profileimporter">Profile importer</a></li>
          </ul>
          <!-- End Sub Menu -->
        </li>
        <li class="@if(isset($menu) && $menu=='performance') active sub-menu-opened @endif has-sub-item">
          <a href="#">
            <i class="icofont-chart-histogram-alt"></i>
            <span class="link-title">Performance</span>
          </a>

          <!-- Sub Menu -->
          <ul class="nav sub-menu">
            <li class="@if(isset($submenu) && $submenu=='facebook') active @endif"><a href="{{url('/')}}/performance/facebook">Facebook</a></li>
            <li class="@if(isset($submenu) && $submenu=='instagram') active @endif"><a href="{{url('/')}}/performance/instagram">Instagram</a></li>
            <li class="@if(isset($submenu) && $submenu=='x') active @endif"><a href="{{url('/')}}/performance/x">X (Twitter)</a></li>
            <li class="@if(isset($submenu) && $submenu=='threads') active @endif"><a href="{{url('/')}}/performance/threads">Threads</a></li>
            <li class="@if(isset($submenu) && $submenu=='tiktok') active @endif"><a href="{{url('/')}}/performance/tiktok">TikTok</a></li>
            <li class="@if(isset($submenu) && $submenu=='youtube') active @endif"><a href="{{url('/')}}/performance/youtube">Youtube</a></li>
          </ul>
          <!-- End Sub Menu -->
        </li>
        <li class="@if(isset($menu) && $menu=='generativeai') active sub-menu-opened @endif has-sub-item">
          <a href="#">
            <i class="icofont-bulb-alt"></i>
            <span class="link-title">Generative AI</span>
          </a>

          <!-- Sub Menu -->
          <ul class="nav sub-menu">
            <li class="@if(isset($submenu) && $submenu=='socialpost') active @endif"><a href="{{url('/')}}/generativeai/socialpost">Social Post</a></li>
            <li class="@if(isset($submenu) && $submenu=='socialvideo') active @endif"><a href="{{url('/')}}/generativeai/socialvideo">Social Video</a></li>
            <li class="@if(isset($submenu) && $submenu=='socialcomment') active @endif"><a href="{{url('/')}}/generativeai/socialcomment">Social Comment</a></li>
            <li class="@if(isset($submenu) && $submenu=='socialinbox') active @endif"><a href="{{url('/')}}/generativeai/socialinbox">Social Inbox</a></li>

          </ul>
          <!-- End Sub Menu -->
        </li>
        <li class="@if(isset($menu) && $menu=='content') active sub-menu-opened @endif has-sub-item">
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
<!-- End Sidebar -->