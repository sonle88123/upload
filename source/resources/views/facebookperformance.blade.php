<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Page Title -->
   <title>{{ $pagetitle }} | KOLs Management System</title>

   <!-- Meta Data -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="KOLs Management System, a product of Trendi AI">
   <meta name="keywords" content="">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- Favicon -->
   <link rel="shortcut icon" href="{{url('/')}}/trendifavicon.png">

   <!-- Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
   <link rel="stylesheet" href="{{url('/')}}/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{url('/')}}/fonts/icofont/icofont.min.css">
   <link rel="stylesheet" href="{{url('/')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
   <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

   <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <link rel="stylesheet" href="{{ url('/') }}/vendor/apex/apexcharts.css">
   <link type="text/css" href="{{ url('/') }}/vendor/datatables/datatables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ url('/') }}/fonts/elegant_icons/elegant-icons.css">
   <link rel="stylesheet" href="{{ url('/') }}/vendor/daterangepicker/daterangepicker.css">
   <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

   <!-- ======= MAIN STYLES ======= -->
   <link rel="stylesheet" href="{{url('/')}}/css/style.css">
   <link rel="stylesheet" href="{{url('/')}}/css/kms.css?v=0.0.1">
   <!-- ======= END MAIN STYLES ======= -->

</head>

<body>

   <!-- Offcanval Overlay -->
   <div class="offcanvas-overlay"></div>
   <!-- Offcanval Overlay -->

   <!-- Wrapper -->
   <div class="wrapper">

      @include('parts.header')

      <!-- Main Wrapper -->
      <div class="main-wrapper">
         @include('parts.sidebar')

         <!-- Main Content -->
         <div class="main-content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <h3>Facebook Performance</h3>
                  </div>
                  <div class="col-md-6 mb-3">
                     <div class="autocomplete">
                        <!-- Form Group -->
                        <div class="form-group">
                           <div class="input-group addon radius-50 ov-hidden">
                              <div id="load-profile" class="input-group-prepend">
                                 <div class="input-group-text bg-light pointer">
                                    <img src="{{ url('/') }}/img/svg/search-icon.svg" alt="" class="svg">
                                 </div>
                              </div>
                              <input type="text" id="autocomplete-input" class="form-control" placeholder="Profile code">
                           </div>
                           <div class="background-suggestions"></div>
                           <div id="suggestions" class="suggestions"></div>
                        </div>
                        <!-- End Form Group -->
                     </div>
                  </div>
               </div>
               <div id="ProfileDashboard" class="row">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-12">
                           <div class="card mt-1">
                              <!-- User Profile Nav -->
                              <div class="user-profile-nav d-flex justify-content-xl-between align-items-xl-center flex-column flex-xl-row">
                                 <!-- Profile Info -->
                                 <div class="profile-info d-flex align-items-center">
                                    <div class="profile-pic me-3">
                                       <img id="profileAvatar" src="{{ url('/') }}/img/media/profile-pic.jpg" alt="">
                                    </div>

                                    <div>
                                       <h3 id="profileFullname">Abrilay Khatun</h3>
                                       <p id="profileJob" class="font-14">Head Of Business Development</p>
                                    </div>
                                 </div>
                                 <!-- End Profile Info -->

                                 <div class="d-flex align-items-center mt-3 mt-xl-0">
                                    <ul class="nav profile-nav-tabs">
                                       <li>
                                          <a class="conncetion" href="#">
                                             <div class="btn-circle me-20">
                                                <img src="{{ url('/') }}/img/svg/user-check.svg" alt="" class="svg">
                                             </div>
                                             <div class="font-14">
                                                <h4 id="profileFollow">154</h4>
                                                <p class="font-14 text_color">Follower</p>
                                             </div>
                                          </a>
                                       </li>
                                       <li style="min-width: 250px;padding-right: 10px">
                                          <!-- Form Group -->
                                          <div class="form-group mb-4 mb-lg-0">
                                             <label class="mb-2 font-14 bold">Select Date</label>

                                             <!-- Date Picker -->
                                             <div class="dashboard-date style--four">
                                                <span class="input-group-addon">
                                                   <img src="{{ url('/') }}/img/svg/calender.svg" alt="" class="svg">
                                                </span>

                                                <!-- <input type="text" id="default-date" placeholder="Select Date"/> -->
                                                <input type="text" name="daterange" value="01/01/2024 - <?php echo date('m/d/Y') ?>" />
                                             </div>
                                             <!-- End Date Picker -->
                                          </div>
                                          <!-- End Form Group -->
                                       </li>
                                    </ul>
                                 </div>

                              </div>
                              <!-- End User Profile Nav -->
                           </div>
                        </div>
                     </div>

                     <div class="mt-30">
                        <div class="row">
                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate support text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="icofont-letterbox large"></i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">Reach</h4>
                                          <h2 id="profileReach">251k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate report text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="material-icons large">assistant</i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">Engagement</h4>
                                          <h2 id="profileEngagement">251k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate order style--two text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="material-icons large">art_track</i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">Post</h4>
                                          <h2 id="profilePost">251k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="icofont-read-book large"></i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">Page view</h4>
                                          <h2 id="profilePageview">251k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="icofont-video-alt large"></i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">Video view</h4>
                                          <h2 id="profileVideoview">251k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate order text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="material-icons large">video_library</i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">Reel play</h4>
                                          <h2 id="profileReelplay">245k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate report text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="icofont-duotone icofont-click large"></i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">Click</h4>
                                          <h2 id="profileClick">245k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-xl-3 col-sm-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="state statistics-bounce-rate support text-white">
                                    <div class="d-flex align-items-center flex-wrap">
                                       <div class="state-icon d-flex justify-content-center">
                                          <i class="icofont-duotone icofont-add-users large"></i>
                                       </div>
                                       <div class="state-content">
                                          <h4 class="mb-2">New follower</h4>
                                          <h2 id="profileNewfollower">251k</h2>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-lg-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="card-body pb-1">
                                    <h4>Gender of audience</h4>
                                 </div>
                                 <div class="p-3 h-350">
                                    <canvas id="fb-audience-age-chart"></canvas>
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-lg-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="card-body">
                                    <div class="d-flex justify-content-between media">
                                       <div class="d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row mb-sm-n3  media-body">
                                          <div class="title-content mb-4 mb-sm-0">
                                             <h4>Top Countries</h4>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div id="nationality_donut-chart"></div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-12 mt-5 mb-3">
                              <h2>Statistics</h2>
                           </div>

                           <div class="col-12 mb-3">
                              <!-- Card -->
                              <div class="card bg-transparent">
                                 <div class="card-body bg-white">
                                    <div class="d-flex flex-column flex-xl-row justify-content-xl-between mb-2">
                                       <div class="mb-4 mb-xl-0">
                                          <select id="typeFilter" class="form-control mt-3" style="width: 250px;">
                                             <option value="" selected>Total</option>
                                             <option value="link">Link</option>
                                             <option value="photo">Photo</option>
                                             <option value="video">Video</option>
                                             <option value="reel">Reel</option>
                                             <option value="live">Live</option>
                                          </select>
                                       </div>

                                       <div class="d-flex align-items-center flex-wrap">
                                          <div class="d-flex align-items-center me-4 me-xl-5 ml-xl-n2 mb-4 mb-sm-0">
                                             <div class="">
                                                <p id="titleStatistics1" class="mb-1 font-14 l-height1">Total</p>
                                                <h4 id="countStatistics1">164</h4>
                                             </div>
                                          </div>

                                          <div class="d-flex align-items-center me-4 me-xl-5 ml-xl-n2 mb-4 mb-sm-0">
                                             <div class="">
                                                <p id="titleStatistics2" class="mb-1 font-14 l-height1">Reach</p>
                                                <h4 id="countStatistics2">
                                                   <?php $reach = rand(2000, 3000);
                                                   echo $reach; ?>
                                                </h4>
                                             </div>
                                          </div>

                                          <div class="d-flex align-items-center me-4 me-xl-5 ml-xl-n2 mb-4 mb-sm-0">
                                             <div class="">
                                                <p id="titleStatistics3" class="mb-1 font-14 l-height1">Engagement</p>
                                                <h4 id="countStatistics3">
                                                   <?php $engagement = rand(2000, 3000);
                                                   echo $engagement; ?>
                                                </h4>
                                             </div>
                                          </div>

                                          <div class="d-flex align-items-center me-4 me-xl-5 ml-xl-n2 mb-4 mb-sm-0">
                                             <div class="">
                                                <p id="titleStatistics4" class="mb-1 font-14 l-height1">View</p>
                                                <h4 id="countStatistics4">
                                                   <?php $view = rand(2000, 3000);
                                                   echo $view; ?>
                                                </h4>
                                             </div>
                                          </div>

                                          <div class="d-flex align-items-center mb-4 mb-sm-0">
                                             <div class="">
                                                <p id="titleStatistics5" class="mb-1 font-14 l-height1">Click</p>
                                                <h4 id="countStatistics5">
                                                   <?php $click = rand(2000, 3000);
                                                   echo $click; ?>
                                                </h4>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="table-responsive pb-3" style="background-color: #fff;">
                                    <!-- List Table -->
                                    <table id="ContentTable" class="text-nowrap table-contextual dh-table">
                                       <thead>
                                          <tr>
                                             <th style="width: 70px;"></th>
                                             <th>Content</th>
                                             <th class="d-none">Type</th>
                                             <th>Date</th>
                                             <th>Reach</th>
                                             <th>Like & React</th>
                                             <th>Comment</th>
                                             <th>Share</th>
                                             <th>Reaction</th>
                                             <th>Impression</th>
                                             <th>Click</th>
                                             <th>Played</th>
                                             <th>Minutes Viewed</th>
                                             <th>Avg. Minutes Viewed</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr data-type="photo">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17230035251.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid02frJLSiX6RkwTxTdUeYH4Pj18a3w3nMDR8qvWSicR3yFmj1af6jNrysdiYDvAJaHdl" target="_blank">Method dressing is making a grand comeback...</a></td>
                                             <td class="d-none">photo</td>
                                             <td>08/09/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td></td>
                                             <td></td>
                                             <td class="text-end"></td>
                                          </tr>
                                          <tr data-type="photo">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17230180482.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid0eRJQyupYJH5tzDMJrLRRW4hfpYryhJEL5SrT7kFT5KT2akiK6eiM6f4hm2C8irA5l" target="_blank">A splash of color and creativity is coming to Robinsons...</a></td>
                                             <td class="d-none">photo</td>
                                             <td>08/09/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td></td>
                                             <td></td>
                                             <td class="text-end"></td>
                                          </tr>
                                          <tr data-type="video">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17230005749.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid02d4T6ZbeCRQwGmYCQPQwENXBqXP2LqD4Q6FqsTmHWhCZXQhXHKVCFNWdX9fa2yAq7l" target="_blank">Flight delays and cancellations are nothing new in the world...</a></td>
                                             <td class="d-none">video</td>
                                             <td>08/08/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(50, 150);
                                                   echo $reach; ?></td>
                                             <td class="text-end">0:<?php $reach = rand(11, 59);
                                                                     echo $reach; ?></td>
                                          </tr>
                                          <tr data-type="reel">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17230178964.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid02X3xgbeeG9wm11Yd7VNnb3tfpBGis5aqWnSbBCVThB8VUV9v7gVruCVBtwGzdKGQNl" target="_blank">The buzz of excitement is palpable...</a></td>
                                             <td class="d-none">reel</td>
                                             <td>08/07/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(50, 150);
                                                   echo $reach; ?></td>
                                             <td class="text-end">0:<?php $reach = rand(11, 59);
                                                                     echo $reach; ?></td>
                                          </tr>
                                          <tr data-type="link">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17230221502.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid0pDXBiPhvc2chZ3LtHZtq2cY8wckXa2ryxBUAXVds3qtujYvqzBB8Kqjmbc4JM1LZl" target="_blank">Recently, Vice President Kamala Harris made...</a></td>
                                             <td class="d-none">link</td>
                                             <td>08/06/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td></td>
                                             <td></td>
                                             <td class="text-end"></td>
                                          </tr>
                                          <tr data-type="link">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17230149561.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid02cKRQJWdtoiHbkqznbRtw4hFhJpKKgKyTE5bh7gLytT9c5fmj6HhSrKAxFHxxJyjpl" target="_blank">The Labour Party (LP), Nigeria’s rising political force,...</a></td>
                                             <td class="d-none">link</td>
                                             <td>08/06/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td></td>
                                             <td></td>
                                             <td class="text-end"></td>
                                          </tr>
                                          <tr data-type="video">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17229928022.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid0fqD5X9WcR2BB53V5J6dnyoB7DBBjHjCbSKuZ6xZDvYHRZsdyhd74umbfrcZxxX1Jl" target="_blank">Suhana Khan and Ananya Panday recently spent a lovely...</a></td>
                                             <td class="d-none">video</td>
                                             <td>08/05/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(50, 150);
                                                   echo $reach; ?></td>
                                             <td class="text-end">0:<?php $reach = rand(11, 59);
                                                                     echo $reach; ?></td>
                                          </tr>
                                          <tr data-type="reel">
                                             <td style="padding: 10px 5px;width: 70px;">
                                                <img src="https://cdnfna.fnews.ai/2024/08/POST17229936371.jpg.webp" alt="Content 1" class="" width="70">
                                             </td>
                                             <td><a href="https://www.facebook.com/Fnewsai/posts/pfbid03341GpkqPsLn7UJfqvHyucepKy88moDuJVmb2UTYduNcENW9Gi5NZsvVhWNZ7CsUWl" target="_blank">After experiencing a tumultuous beginning to the week...</a></td>
                                             <td class="d-none">reel</td>
                                             <td>08/04/2024</td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(100, 150);
                                                   echo $reach; ?></td>
                                             <td><?php $reach = rand(50, 150);
                                                   echo $reach; ?></td>
                                             <td class="text-end">0:<?php $reach = rand(11, 59);
                                                                     echo $reach; ?></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!-- End List Table -->
                                 </div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-12 mt-5 mb-3">
                              <h2>Analytics</h2>
                           </div>

                           <div class="col-md-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="card-body d-flex justify-content-between mb-n72">
                                    <div class="position-relative index-9">
                                       <h4 class="mb-1">Post</h4>
                                       <p class="font-14">Check out each column for more details</p>
                                    </div>
                                 </div>
                                 <div id="apex_column-chart"></div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-md-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="card-body d-flex justify-content-between mb-n72">
                                    <div class="position-relative index-9">
                                       <h4 class="mb-1">Video</h4>
                                       <p class="font-14">Check out each column for more details</p>
                                    </div>
                                 </div>
                                 <div id="apex_column-chart-video"></div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-md-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="card-body d-flex justify-content-between mb-n72">
                                    <div class="position-relative index-9">
                                       <h4 class="mb-1">Reel</h4>
                                       <p class="font-14">Check out each column for more details</p>
                                    </div>
                                 </div>
                                 <div id="apex_column-chart-reel"></div>
                              </div>
                              <!-- End Card -->
                           </div>

                           <div class="col-md-6">
                              <!-- Card -->
                              <div class="card mb-30">
                                 <div class="card-body d-flex justify-content-between mb-n72">
                                    <div class="position-relative index-9">
                                       <h4 class="mb-1">Live</h4>
                                       <p class="font-14">Check out each column for more details</p>
                                    </div>
                                 </div>
                                 <div id="apex_column-chart-live"></div>
                              </div>
                              <!-- End Card -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Main Content -->
      </div>
      <!-- End Main Wrapper -->

      @include('parts.footer')
   </div>
   <!-- End wrapper -->

   <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
   <script src="{{url('/')}}/js/jquery.min.js"></script>
   <script src="{{url('/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="{{url('/')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
   <script src="{{url('/')}}/js/script.js"></script>
   <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

   <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script src="{{url('/')}}/vendor/apex/apexcharts.min.js"></script>
   <script src="{{url('/')}}/vendor/chartjs/Chart.min.js"></script>
   <script src="{{ url('/') }}/vendor/datatables/datatables.min.js"></script>
   <script src="{{ url('/') }}/vendor/moment/moment.min.js"></script>
   <script src="{{ url('/') }}/vendor/daterangepicker/daterangepicker.js"></script>
   <script>
      var fb_audience_age;
      var fb_audience_nationality;

      function formatWithK(num) {
         if (num >= 50000) {
            return (num / 1000).toFixed(0) + 'k';
         } else {
            return num.toLocaleString(); // Add thousand separators for numbers less than 50,000
         }
      }

      function getRandomColor() {
         var letters = '0123456789ABCDEF';
         var color = '#';
         for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
         }
         return color;
      }

      $(document).ready(function() {
         // Set CSRF token header for every AJAX request
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         new DataTable('#ContentTable', {
            info: true,
            ordering: true,
            paging: true
         });

         var countPhoto = 0;
         var countVideo = 0;
         var countReel = 0;
         var countLive = 0;
         var countLink = 0;

         $('#ContentTable tbody tr').each(function() {
            var type = $(this).find('td:eq(2)').text().toLowerCase();
            if (type === 'photo') {
               countPhoto++;
            } else if (type === 'video') {
               countVideo++;
            } else if (type === 'reel') {
               countReel++;
            } else if (type === 'live') {
               countLive++;
            } else if (type === 'link') {
               countLink++;
            }
         });

         $('#countStatistics1').text(countPhoto + countVideo + countReel + countLive + countLink);

         function rand(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
         }

         $('#typeFilter').on('change', function() {
            countStatistics1 = rand(500, 1000);
            countStatistics2 = rand(500, 1000);
            countStatistics3 = rand(500, 1000);
            countStatistics4 = rand(500, 1000);
            countStatistics5 = rand(500, 1000);

            var selectedType = $(this).val().toLowerCase(); // Get the selected value and convert to lowercase
            $('#ContentTable tbody tr').filter(function() {
               var type = $(this).find('td:eq(2)').text().toLowerCase(); // Get the text from the Type column and convert to lowercase
               if (selectedType !== '') {
                  $(this).toggle(type === selectedType); // Show/Hide the row based on the match
               } else {
                  $(this).show(); // If "All Types" is selected, show all rows
               }
            });

            // Update the statistics count based on the selected type
            if (selectedType === '') {
               $('#countStatistics1').text(countPhoto + countVideo + countReel + countLive);
               $('#titleStatistics2').text("Reach");
               $('#titleStatistics3').text("Engagement");
               $('#titleStatistics4').text("View");
               $('#titleStatistics5').text("Click");
            } else if (selectedType === 'photo') {
               $('#countStatistics1').text(countPhoto);
               $('#titleStatistics2').text("Reach");
               $('#titleStatistics3').text("Engagement");
               $('#titleStatistics4').text("Click post");
               $('#titleStatistics5').text("Click link");
            } else if (selectedType === 'video') {
               $('#countStatistics1').text(countVideo);
               $('#titleStatistics2').text("Reach");
               $('#titleStatistics3').text("Engagement");
               $('#titleStatistics4').text("View");
               $('#titleStatistics5').text("View 1m");
            } else if (selectedType === 'reel') {
               $('#countStatistics1').text(countReel);
               $('#titleStatistics2').text("Reach");
               $('#titleStatistics3').text("Engagement");
               $('#titleStatistics4').text("Play");
               $('#titleStatistics5').text("Completion");
            } else if (selectedType === 'live') {
               $('#countStatistics1').text(countLive);
               $('#titleStatistics2').text("Reach");
               $('#titleStatistics3').text("Engagement");
               $('#titleStatistics4').text("View");
               $('#titleStatistics5').text("Click");
            } else if (selectedType === 'link') {
               $('#countStatistics1').text(countLink);
               $('#titleStatistics2').text("Reach");
               $('#titleStatistics3').text("Engagement");
               $('#titleStatistics4').text("View");
               $('#titleStatistics5').text("Click");
            }

            $('#countStatistics2').text(countStatistics2);
            $('#countStatistics3').text(countStatistics3);
            $('#countStatistics4').text(countStatistics4);
            $('#countStatistics5').text(countStatistics5);
         });

         const $input = $('#autocomplete-input');
         const $suggestions = $('#suggestions');
         let suggestions = [];

         // Sample data containing profile information
         var profileList = @json($profilelist);

         $input.on('input', function() {
            const query = $(this).val().toLowerCase();

            if (query.length < 3) {
               // Clear suggestions if fewer than 3 characters are typed
               $suggestions.empty();
               return;
            }

            // Filter profileList based on the query
            suggestions = profileList.filter(item => item.code_profile.toLowerCase().includes(query));
            displaySuggestions(suggestions);
         });

         function displaySuggestions(suggestions) {
            $suggestions.empty(); // Clear previous suggestions
            suggestions.forEach((suggestion) => {
               const $div = $('<div>').addClass('suggestion-item').addClass('row');

               var $html = '<img src="' + suggestion.avatar + '" class="col-3 py1-1" alt="' + suggestion.fullname + '" style="width: 130px;"><div class="col-8 ps-0 pe-1"><span>' + suggestion.code_profile + ' - ' + suggestion.fullname + ' - Age ' + suggestion.age + ' - ' + suggestion.nationality + '</span></div>';

               $div.html($html);
               $div.on('click', function() {
                  $input.val(suggestion.code_profile);
                  $suggestions.empty();
               });
               $suggestions.append($div);
            });
         }

         // Hide suggestions when input loses focus
         $input.on('blur', function() {
            setTimeout(() => {
               $suggestions.empty();
            }, 200);
         });

         // Prevent hiding suggestions on suggestion item click
         $suggestions.on('mousedown', function(event) {
            event.preventDefault();
         });

         $input.on('keydown', function(e) {
            if (e.key === 'Enter') {
               handleProfileSelection();
            }
         });

         $('#load-profile').on('click', handleProfileSelection);

         function handleProfileSelection() {
            const inputVal = $input.val().toLowerCase();
            const profile = profileList.find(item => item.code_profile.toLowerCase() === inputVal);

            console.log(profile);

            if (profile) {
               // If profile is found, make an AJAX call to fetch the profile details
               $.ajax({
                  url: "{{ url('/performance/facebook/detail') }}", // The route to fetch profile details
                  method: 'POST',
                  data: {
                     id: profile.id
                  },
                  success: function(data) {
                     $input.val(''); // Clear the input field
                     $suggestions.empty(); // Clear suggestions if any

                     console.log(data);

                     var detailprofile = data.profile;
                     var avatar = data.avatar;
                     fb_audience_age = data.fb_audience_age;
                     fb_audience_nationality = data.fb_audience_nationality;

                     $('#profileAvatar').attr('src', avatar.url);
                     $('#profileFullname').text(detailprofile.fullname);
                     $('#profileJob').text(detailprofile.job);
                     $('#profileFollow').text(formatWithK(detailprofile.follow));

                     $('#profileReach').text(formatWithK(detailprofile.fb_reach));
                     $('#profileEngagement').text(formatWithK(detailprofile.fb_engagement));
                     $('#profilePost').text(formatWithK(detailprofile.post));
                     $('#profilePageview').text(formatWithK(detailprofile.fb_pageview));
                     $('#profileVideoview').text(formatWithK(detailprofile.fb_video_view));
                     $('#profileReelplay').text(formatWithK(detailprofile.fb_reel_play));
                     $('#profileClick').text(formatWithK(detailprofile.fb_click));

                     $('#ProfileDashboard').removeClass('d-none');

                     fbAudienceAgechart();
                     fbAudienceNationalitychart();
                  },
                  error: function(xhr, status, error) {
                     console.error("Error fetching profile details:", error);
                  }
               });
            } else {
               alert("Profile not found!");
            }
         }

         //Date Range Picker
         if ($('input[name="daterange"]').length) {
            $('input[name="daterange"]').daterangepicker({
               opens: 'left'
            }, function(start, end, label) {
               console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
         }
      });

      function fbAudienceAgechart() {
         var fac = document.getElementById("fb-audience-age-chart");

         // Filter and map values where
         var femaleData = fb_audience_age.filter(function(item) {
            return item.gender === 0;
         }).map(function(item) {
            return item.value;
         });

         var maleData = fb_audience_age.filter(function(item) {
            return item.gender === 1;
         }).map(function(item) {
            return item.value;
         });

         var fbaaChart = new Chart(fac, {
            type: 'bar',
            data: {
               labels: ["18-24", "25-34", "35-44", "45-54", "55-64", "65+"],
               datasets: [{
                  label: "Female",
                  data: femaleData,
                  borderColor: "rgba(86, 78, 193, 0.9)",
                  borderWidth: "0",
                  backgroundColor: "rgba(86, 78, 193, 0.7)"
               }, {
                  label: "Male",
                  data: maleData,
                  borderColor: "rgba(4, 202, 208,0.9)",
                  borderWidth: "0",
                  backgroundColor: "rgba(4, 202, 208,0.7)"
               }]
            },
            options: {
               responsive: true,
               maintainAspectRatio: false,
               scales: {
                  xAxes: [{
                     display: true,
                     gridLines: {
                        display: false,
                        drawBorder: false,
                        color: 'rgb(227, 226, 236,0.4)'
                     },
                     ticks: {
                        fontColor: "#9493a9",
                     },
                     scaleLabel: {
                        display: false,
                        labelString: 'Range',
                     }
                  }],
                  yAxes: [{
                     display: true,
                     gridLines: {
                        display: true,
                        drawBorder: false,
                        color: 'rgb(227, 226, 236,0.4)'
                     },
                     ticks: {
                        fontColor: "#9493a9",

                     },
                     scaleLabel: {
                        display: false,
                        labelString: 'Value',
                        fontColor: "#9493a9",
                     }
                  }]
               },
            }
         });
      }

      function fbAudienceNationalitychart() {
         // Extract the values for the chart data
         var nationValues = fb_audience_nationality.map(function(item) {
            return item.value;
         });

         var nationName = fb_audience_nationality.map(function(item) {
            return item.nationality + " (<strong>" + item.value + " followers</strong>)";
         });

         var donut_options = {
            series: nationValues,
            chart: {
               height: 338,
               type: 'donut',
            },
            labels: nationName,
            colors: ["#FFBE9C", "#FF9C9F", "#D19CFF", "#8ADBFF", "#B2F378"],
            legend: {
               position: 'left',
               fontSize: '12px',
               fontFamily: '"Montserrat", sans-serif',
               offsetY: 20,
               offsetX: 0,
               labels: {
                  colors: "#727272"
               },
               itemMargin: {
                  horizontal: 4,
                  //vertical: 10
               },
               markers: {
                  width: 17,
                  height: 11,
                  radius: 0,
               },
            },
            tooltip: {
               y: {
                  formatter: function(val) {
                     return val + "%";
                  }
               }
            },
            plotOptions: {
               pie: {
                  offsetY: 0,
                  offsetX: 0,
               }
            },
            responsive: [{
               breakpoint: 1900,
               options: {
                  chart: {
                     height: 338
                  },
               }
            }, {
               breakpoint: 1700,
               options: {
                  chart: {
                     height: 338
                  },
                  legend: {
                     position: 'bottom',
                     offsetY: 0,
                  },
                  plotOptions: {
                     pie: {
                        customScale: 0.8,
                        offsetX: 0,
                     }
                  },
               }
            }]
         };

         var donut_chart = new ApexCharts(document.querySelector("#nationality_donut-chart"), donut_options);
         donut_chart.render();
      }

      /*==================================
      05: Apex Column Chart
      ====================================*/
      async function fetchDataAndRenderPostChart() {
         try {
            // Gọi API để lấy dữ liệu
            const response = await fetch('https://fbb.trendi.ai/api/get-insight-page/335323586336510');
            const data = await response.json();

            // Kiểm tra dữ liệu trả về từ API
            console.log("API:", data);

            // Kiểm tra xem dữ liệu có phải là một mảng hay không
            if (Array.isArray(data.insight_index_posts)) {

               const fullMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

               const reachData = new Array(12).fill(0);
               const impressionData = new Array(12).fill(0);
               const engagementData = new Array(12).fill(0);

               // Hàm để cộng dữ liệu từ các bảng insight_index
               function aggregateDataFromSource(source) {
                  source.forEach(record => {
                     const createdAt = new Date(record.created_at);
                     const monthIndex = createdAt.getMonth(); // Lấy chỉ mục tháng (0 - Jan, 11 - Dec)

                     // Cộng dữ liệu vào các mảng tương ứng
                     reachData[monthIndex] += record.reach || 0;
                     impressionData[monthIndex] += record.impression || 0;
                     engagementData[monthIndex] += (record.like || 0) + (record.comment || 0) +
                        (record.share || 0) + (record.reaction || 0) + (record.click || 0);
                  });
               }


               aggregateDataFromSource(data.insight_links || []);
               aggregateDataFromSource(data.insight_photos || []);
               aggregateDataFromSource(data.insight_reels || []);
               aggregateDataFromSource(data.insight_videos || []);
               // aggregateDataFromSource(data.insight_live || []);

               // Cập nhật dữ liệu cho biểu đồ
               var column_options = {
                  series: [{
                     name: 'Impression',
                     data: impressionData // Tổng Impression
                  }, {
                     name: 'Reach',
                     data: reachData // Tổng Reach
                  }, {
                     name: 'Engagement',
                     data: engagementData // Tổng Engagement
                  }],
                  chart: {
                     type: 'bar',
                     height: 389,
                     toolbar: {
                        show: false,
                     },
                  },
                  colors: ['#76B0FF', '#67CF94', '#0AD1DE'],
                  fill: {
                     type: 'gradient',
                     gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 0.5,
                        gradientToColors: ['#76B0FF', '#67CF94', '#0AD1DE'],
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 0.6,
                        stops: [0, 80],
                     },
                  },
                  plotOptions: {
                     bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                     },
                  },
                  dataLabels: {
                     enabled: false
                  },
                  stroke: {
                     show: true,
                     width: 2,
                     colors: ['transparent']
                  },
                  xaxis: {
                     categories: fullMonths,
                  },
                  yaxis: {
                     tickAmount: 4,
                     title: {
                        text: 'count'
                     }
                  },
                  legend: {
                     position: 'top',
                     horizontalAlign: 'right',
                     fontSize: '12px',
                     fontFamily: '"PT Sans", sans-serif',
                     offsetY: 0,
                     height: 60,
                     labels: {
                        colors: "#727272"
                     },
                     itemMargin: {
                        horizontal: 5,
                        vertical: 20
                     },
                     markers: {
                        width: 17,
                        height: 11,
                        radius: 0,
                     },
                  },
                  tooltip: {
                     y: {
                        formatter: function(val) {
                           return val + " times";
                        }
                     }
                  },
                  responsive: [{
                     breakpoint: 576,
                     options: {
                        legend: {
                           position: "top",
                           horizontalAlign: 'left',
                           height: 0,
                           itemMargin: {
                              horizontal: 5,
                              vertical: 10
                           },
                        }
                     }
                  }],
               };

               // Render chart
               var columnChart = new ApexCharts(document.querySelector("#apex_column-chart"), column_options);
               columnChart.render();

            } else {
               console.error("Dữ liệu trả về không phải là một mảng:", data);
            }

         } catch (error) {
            console.error("Error fetching data from API:", error);
         }
      }

      // Gọi hàm để lấy dữ liệu và render biểu đồ
      fetchDataAndRenderPostChart();



      /*==================================
      05: Apex Column Chart
      ====================================*/
      async function fetchDataAndRenderVideoChart() {
         try {
            const response = await fetch('https://fbb.trendi.ai/api/get-insight-page/335323586336510');
            const data = await response.json();

            // Khởi tạo mảng chứa 12 tháng
            const fullMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            // Khởi tạo các mảng để lưu dữ liệu cho Reach, View, Impression theo tháng với giá trị mặc định là 0
            const reachData = new Array(12).fill(0);
            const impressionData = new Array(12).fill(0);
            const viewData = new Array(12).fill(0);
            const view1mData = new Array(12).fill(0);


            data.insight_videos.forEach(video => {
               const createdAt = new Date(video.created_at);
               const monthIndex = createdAt.getMonth(); // Lấy chỉ mục tháng (0 - Jan, 11 - Dec)

               // Thêm dữ liệu vào các mảng tương ứng cho đúng tháng
               reachData[monthIndex] += video.reach || 0;
               impressionData[monthIndex] += video.impression || 0;
               viewData[monthIndex] += video.view3s || 0;
               view1mData[monthIndex] += video.view60s || 0;
            });

            // Cập nhật dữ liệu cho biểu đồ
            const column_options_video = {
               series: [{
                  name: 'Reach',
                  data: reachData
               }, {
                  name: 'Impression',
                  data: impressionData
               }, {
                  name: 'View',
                  data: viewData
               }, {
                  name: 'View 1m',
                  data: view1mData
               }],
               chart: {
                  type: 'bar',
                  height: 389,
                  toolbar: {
                     show: false,
                  },
               },
               colors: ['#76B0FF', '#67CF94', '#0AD1DE', '#D10ADE'],
               fill: {
                  type: 'gradient',
                  gradient: {
                     shade: 'light',
                     type: "vertical",
                     shadeIntensity: 0.5,
                     gradientToColors: ['#76B0FF', '#67CF94', '#0AD1DE', '#D10ADE'],
                     inverseColors: false,
                     opacityFrom: 1,
                     opacityTo: 0.6,
                     stops: [0, 80],
                  },
               },
               plotOptions: {
                  bar: {
                     horizontal: false,
                     columnWidth: '55%',
                     endingShape: 'rounded'
                  },
               },
               dataLabels: {
                  enabled: false
               },
               stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
               },
               xaxis: {
                  categories: fullMonths, 
               },
               yaxis: {
                  tickAmount: 4,
                  title: {
                     text: 'count'
                  }
               },
               legend: {
                  position: 'top',
                  horizontalAlign: 'right',
                  fontSize: '12px',
                  fontFamily: '"PT Sans", sans-serif',
                  offsetY: 0,
                  height: 60,
                  labels: {
                     colors: "#727272"
                  },
                  itemMargin: {
                     horizontal: 5,
                     vertical: 20
                  },
                  markers: {
                     width: 17,
                     height: 11,
                     radius: 0,
                  },
               },
               tooltip: {
                  y: {
                     formatter: function(val) {
                        return val + " times";
                     }
                  }
               },
               responsive: [{
                  breakpoint: 576,
                  options: {
                     legend: {
                        position: "top",
                        horizontalAlign: 'left',
                        height: 0,
                        itemMargin: {
                           horizontal: 5,
                           vertical: 10
                        },
                     }
                  }
               }],
            };

            // Khởi tạo biểu đồ
            var columnChart = new ApexCharts(document.querySelector("#apex_column-chart-video"), column_options_video);
            columnChart.render();

         } catch (error) {
            console.error("Error fetching and processing data:", error);
         }
      }

      // Gọi hàm để lấy dữ liệu và render biểu đồ
      fetchDataAndRenderVideoChart();


      async function fetchDataAndRenderReelChart() {
         try {
            const response = await fetch('https://fbb.trendi.ai/api/get-insight-page/335323586336510');
            const data = await response.json();

            // Tạo mảng chứa dữ liệu cho Reels
            const reelReachData = new Array(12).fill(0);
            const reelEngagementData = new Array(12).fill(0);
            const reelViewData = new Array(12).fill(0);

            const fullMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            data.insight_reels.forEach(reel => {
               const createdAt = new Date(reel.created_at);
               const monthIndex = createdAt.getMonth(); // Lấy chỉ mục tháng

               reelReachData[monthIndex] += reel.reach !== null ? reel.reach : 0;
               const engagement = (reel.like || 0) + (reel.comment || 0) + (reel.share || 0) + (reel.reaction || 0) + (reel.click || 0);
               reelEngagementData[monthIndex] += engagement;

               const view = (reel.plays || 0);
               reelViewData[monthIndex] += view;
            });

            const column_options_reel = {
               series: [{
                  name: 'Reach',
                  data: reelReachData
               }, {
                  name: 'Engagement',
                  data: reelEngagementData
               }, {
                  name: 'View',
                  data: reelViewData
               }],
               chart: {
                  type: 'bar',
                  height: 389,
                  toolbar: {
                     show: false,
                  },
               },
               colors: ['#76B0FF', '#67CF94', '#0AD1DE', '#D10ADE'],
               fill: {
                  type: 'gradient',
                  gradient: {
                     shade: 'light',
                     type: "vertical",
                     shadeIntensity: 0.5,
                     gradientToColors: ['#76B0FF', '#67CF94', '#0AD1DE', '#D10ADE'],
                     inverseColors: false,
                     opacityFrom: 1,
                     opacityTo: 0.6,
                     stops: [0, 80],
                  },
               },
               plotOptions: {
                  bar: {
                     horizontal: false,
                     columnWidth: '55%',
                     endingShape: 'rounded'
                  },
               },
               dataLabels: {
                  enabled: false
               },
               stroke: {
                  show: true,
                  width: 2,
                  colors: ['transparent']
               },
               xaxis: {
                  categories: fullMonths, // Sử dụng đầy đủ các tháng
               },
               yaxis: {
                  tickAmount: 4,
                  title: {
                     text: 'count'
                  }
               },
               legend: {
                  position: 'top',
                  horizontalAlign: 'right',
                  fontSize: '12px',
                  fontFamily: '"PT Sans", sans-serif',
                  offsetY: 0,
                  height: 60,
                  labels: {
                     colors: "#727272"
                  },
                  itemMargin: {
                     horizontal: 5,
                     vertical: 20
                  },
                  markers: {
                     width: 17,
                     height: 11,
                     radius: 0,
                  },
               },
               tooltip: {
                  y: {
                     formatter: function(val) {
                        return val + " times";
                     }
                  }
               },
               responsive: [{
                  breakpoint: 576,
                  options: {
                     legend: {
                        position: "top",
                        horizontalAlign: 'left',
                        height: 0,
                        itemMargin: {
                           horizontal: 5,
                           vertical: 10
                        },
                     }
                  }
               }],
            };

            // Render biểu đồ Reels
            var columnChartReel = new ApexCharts(document.querySelector("#apex_column-chart-reel"), column_options_reel);
            columnChartReel.render();

         } catch (error) {
            console.error("Error fetching and processing reel data:", error);
         }
      }

      // Gọi hàm để lấy dữ liệu và render các biểu đồ
      fetchDataAndRenderReelChart();

      var liveData1 = [44, 55, 57, 56, 61, 58, 63, 60, 66, 50, 40];
      var liveData2 = [76, 85, 101, 98, 87, 105, 91, 114, 94, 90, 70];
      var liveData3 = [35, 41, 36, 26, 45, 48, 52, 53, 41, 40, 60];

      var column_options_video = {
         series: [{
            name: 'Reach',
            data: liveData1
         }, {
            name: 'Engagement',
            data: liveData2
         }, {
            name: 'View',
            data: liveData3
         }],
         chart: {
            type: 'bar',
            height: 389,
            toolbar: {
               show: false,
            },
         },
         colors: ['#76B0FF', '#67CF94', '#0AD1DE'],
         fill: {
            type: 'gradient',
            gradient: {
               shade: 'light',
               type: "vertical",
               shadeIntensity: 0.5,
               gradientToColors: ['#76B0FF', '#67CF94', '#0AD1DE', '#D10ADE'],
               inverseColors: false,
               opacityFrom: 1,
               opacityTo: 0.6,
               stops: [0, 80],
            },
         },
         plotOptions: {
            bar: {
               horizontal: false,
               columnWidth: '55%',
               endingShape: 'rounded'
            },
         },
         dataLabels: {
            enabled: false
         },
         stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
         },
         xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
         },
         yaxis: {
            tickAmount: 4,
            title: {
               text: 'count'
            }
         },
         legend: {
            position: 'top',
            horizontalAlign: 'right',
            fontSize: '12px',
            fontFamily: '"PT Sans", sans-serif',
            offsetY: 0,
            height: 60,
            labels: {
               colors: "#727272"
            },
            itemMargin: {
               horizontal: 5,
               vertical: 20
            },
            markers: {
               width: 17,
               height: 11,
               radius: 0,
            },
         },
         tooltip: {
            y: {
               formatter: function(val) {
                  return val + " times";
               }
            }
         },
         responsive: [{
            breakpoint: 576,
            options: {
               legend: {
                  position: "top",
                  horizontalAlign: 'left',
                  height: 0,
                  itemMargin: {
                     horizontal: 5,
                     vertical: 10
                  },
               }
            }
         }],
      };

      var columnChartvideo = new ApexCharts(document.querySelector("#apex_column-chart-live"), column_options_video);
      columnChartvideo.render();
   </script>
</body>

</html>