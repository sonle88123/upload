<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Page Title -->
   <title>KOLs Management System</title>

   <!-- Meta Data -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="KOLs Management System, a product of Trendi AI">
   <meta name="keywords" content="">

   <!-- Favicon -->
   <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/trendifavicon.png">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
   
   <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/fonts/icofont/icofont.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
   <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->
   
   <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/apex/apexcharts.css">
   <link type="text/css" href="<?php echo e(url('/')); ?>/vendor/datatables/datatables.min.css" rel="stylesheet">
   <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

   <!-- ======= MAIN STYLES ======= -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/style.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/kms.css">
   <!-- ======= END MAIN STYLES ======= -->

</head>

<body>

   <!-- Offcanval Overlay -->
   <div class="offcanvas-overlay"></div>
   <!-- Offcanval Overlay -->

   <!-- Wrapper -->
   <div class="wrapper">

      <?php echo $__env->make('parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- Main Wrapper -->
      <div class="main-wrapper">
         <?php echo $__env->make('parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

         <!-- Main Content -->
         <div class="main-content">
            <div class="container-fluid">
               <div class="row d-none">
                  <div class="col-12 mb-3">
                     <h3>FNews AI</h3>
                  </div>
                  <div class="col-xl-4 col-lg-12">
                     <div class="row">
                        <div class="col-xl-6 col-md-3 col-sm-6">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2">
                                    <p class="font-14 mb-1">Followers</p>
                                    <h2>13.3k</h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-6">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2 style--two">
                                    <p class="font-14 mb-1">Reached</p>
                                    <h2>334.6k</h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-6">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2 style--three">
                                    <p class="font-14 mb-1">Interactions</p>
                                    <h2>5,6k</h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-6">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2 style--four">
                                    <p class="font-14 mb-1">Impression</p>
                                    <h2>360.4k</h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>
                     </div>
                  </div>

                  <div class="col-xl-4 col-lg-6">
                     <!-- Card -->
                     <div class="card mb-30">
                           <div class="card-body">
                              <div class="title">Facebook Reach</div>
                              <div class="subtitle">+100.0% vs. Jan 1, 2023 - Dec 31, 2023</div>
                              <div class="label mb-2">Photo - 306,950</div>
                              <div class="bar bar--image mb-3">
                                 <div class="fill" style="width: 100%;"></div>
                              </div>
                              <div class="label mb-2">Link - 28,297</div>
                              <div class="bar bar--link mb-3">
                                 <div class="fill" style="width: 9%;"></div>
                              </div>
                              <div class="label mb-2">Other - 1,632</div>
                              <div class="bar bar--other mb-3">
                                 <div class="fill" style="width: 1%;"></div>
                              </div>
                           </div>
                     </div>
                     <!-- End Card -->
                  </div>

                  <div class="col-xl-4 col-lg-6">
                     <!-- Card -->
                     <div class="card mb-30">
                           <div class="card-body">
                              <div class="title">Content engagement</div>
                              <div class="subtitle">+100.0% vs. Jan 1, 2023 - Dec 31, 2023</div>
                              <div class="label mb-2">Photo - 3,261</div>
                              <div class="bar bar--image mb-3">
                                 <div class="fill" style="width: 100%;"></div>
                              </div>
                              <div class="label mb-2">Link - 2,342</div>
                              <div class="bar bar--link mb-3">
                                 <div class="fill" style="width: 72%;"></div>
                              </div>
                           </div>
                     </div>
                     <!-- End Card -->
                  </div>

                  <div class="col-xl-5 col-lg-6">
                     <!-- Card -->
                     <div class="card pb-2 mb-30">
                        <div class="card-body mb-4 mb-xl-0 pb-0">
                           <div class="d-flex justify-content-between">
                              <div class="title-content">
                                 <h4>Article (News)</h4>
                              </div>
                           </div>
                        </div>
                        <div id="apex_pie2-chart"></div>
                     </div>
                     <!-- End Card -->
                  </div>

                  <div class="col-xl-7 col-lg-6">
                     <!-- Card -->
                     <div class="card mb-30">
                        <div class="card-body d-flex justify-content-between mb-n72">
                           <div class="position-relative index-9">
                              <h4 class="mb-1">Age & Gender</h4>
                           </div>
                        </div>
                        <div id="apex_column-chart"></div>
                     </div>
                     <!-- End Card -->
                  </div>
               </div>

               <div class="row">
                  <div class="col-12 mb-30">
                     <h3>KOLs Management System</h3>
                  </div>

                  <div class="col-12">
                     <div class="row">
                        <div class="col-sm-4 col-md-3">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2 style--two">
                                    <p class="font-14 mb-1">Total profile</p>
                                    <h2><?php echo e(number_format($totalProfiles)); ?></h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>
                        <div class="col-sm-4 col-md-3">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2 style--three">
                                    <p class="font-14 mb-1">Total image of KOLs</p>
                                    <h2><?php echo e(number_format($totalImageProfile)); ?></h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>
                        <div class="col-sm-4 col-md-3">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2">
                                    <p class="font-14 mb-1">Total nationality</p>
                                    <h2><?php echo e(number_format($nationcount)); ?></h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>

                        <div class="col-sm-4 col-md-3">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="state2 style--four">
                                    <p class="font-14 mb-1">Total job</p>
                                    <h2><?php echo e(number_format($jobcount)); ?></h2>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="card-body">
                                 <div class="d-flex justify-content-between">
                                    <div class="">
                                       <h4>Profile by age</h4>
                                    </div>
                                 </div>
                                 <div id="profile-by-age-chart"></div>
                              </div>
                           </div>
                           <!-- End Card -->
                        </div>

                        <div class="col-md-4">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="card-body">
                                 <div class="d-flex justify-content-between media">
                                    <div class="d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row mb-sm-n3  media-body">
                                       <div class="title-content mb-4 mb-sm-0">
                                          <h4>Top Nationality</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <!-- Apex Pie Chart3 legend -->
                              <div class="apex_pie3-chart-legend card-body font-14">
                                 <?php $__currentLoopData = $nationalitylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <!-- Legend Single Item -->
                                 <div class="d-flex mb-10 align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <div class="color-box two"></div>
                                       <div class="c_name"><?php echo e($data['nationality']); ?></div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                       <div><span class="bold black mr-2"><?php echo e($data['count']); ?></span> Profile</div>
                                    </div>
                                 </div>
                                 <!-- End Legend Single Item -->
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <!-- End Apex Pie Chart3 legend -->
                           </div>
                           <!-- End Card -->
                        </div>

                        <div class="col-md-4">
                           <!-- Card -->
                           <div class="card mb-30">
                              <div class="card-body">
                                 <div class="d-flex justify-content-between media">
                                    <div class="d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row mb-sm-n3  media-body">
                                       <div class="title-content mb-4 mb-sm-0">
                                          <h4>Top Job</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <!-- Apex Pie Chart3 legend -->
                              <div class="apex_pie3-chart-legend card-body font-14">
                                 <?php $__currentLoopData = $joblist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <!-- Legend Single Item -->
                                 <div class="d-flex mb-10 align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <div class="color-box three"></div>
                                       <div class="c_name"><?php echo e($data['job']); ?></div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                       <div><span class="bold black mr-2"><?php echo e($data['count']); ?></span> Profile</div>
                                    </div>
                                 </div>
                                 <!-- End Legend Single Item -->
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                              <!-- End Apex Pie Chart3 legend -->
                           </div>
                           <!-- End Card -->
                        </div>
                     </div>
                  </div>

                  <div class="col-12 mb-30">
                      <div class="button-group">
                        <button id="btnAll" class="btn long bg-success-light text-success">All</button>
                        <button id="btnTop100" class="btn long bg-success-light text-success ml-3">Top 100</button>
                        <button id="btnTop10" class="btn long ml-3">Top 10</button>
                     </div>
                  </div>

                  <div class="col-md-8">
                     <!-- Card -->
                     <div class="card mb-20 px-3 py-3">
                        <h4 class="mb-3">Profile list</h4>
                        <table id="tableProfileList" class="table">
                           <thead>
                              <tr>
                                 <th>Code profile</th>
                                 <th>Info</th>
                                 <th>Facebook</th>
                                 <th>X</th>
                                 <th>Instagram</th>
                                 <th>TikTok</th>
                                 <th>Threads</th>
                              </tr>
                           </thead>
                           <tbody class="list" id="ProfileList">
                              <?php
                                 $totalFBFollow = 0;
                                 $totalFBReach = 0;
                                 $totalFBEngagement = 0;
                              ?>
                              <?php $__currentLoopData = $profilelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr id="Profile_<?php echo e($data->id_profile); ?>">
                                 <td><?php echo e($data->code_profile); ?></td>
                                 <td>
                                    <strong><?php echo e($data->fullname); ?></strong>
                                    <ul>
                                       <li>Age: <strong><?php echo e($data->age); ?></strong></li>
                                       <li>Occupation: <strong><?php echo e($data->job); ?></strong></li>
                                       <li>National: <strong><?php echo e($data->nationality); ?></strong></li>
                                    </ul>
                                 </td>
                                 <td>
                                    <a href="https://facebook.com/<?php echo e($data->fb_link); ?>" target="_blank"><?php echo e($data->fb_link); ?></a>
                                    <ul>
                                       <li>Follow: <strong><?php echo e(number_format($data->follow)); ?></strong></li>
                                       <li>Engagement: <strong>
                                          <?php
                                             $engagement = $data->like * 2 + rand(2000, 3000);
                                             echo number_format($engagement);
                                          ?>
                                          </strong></li>
                                       <li>Post: <strong><?php echo e(number_format($data->post)); ?></strong></li>
                                       <?php
                                          $totalFBFollow += $data->follow;
                                          $totalFBReach += $data->like + rand(2000, 3000);
                                          $totalFBEngagement += $engagement;
                                       ?>
                                    </ul>
                                 </td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <input type="hidden" id="totalFBFollow" value="<?php echo e($totalFBFollow); ?>">
                              <input type="hidden" id="totalFBReach" value="<?php echo e($totalFBReach); ?>">
                              <input type="hidden" id="totalFBEngagement" value="<?php echo e($totalFBEngagement); ?>">
                           </tbody>
                        </table>
                     </div>
                     <!-- End Card -->
                  </div>

                  <div class="col-md-4">
                     <div class="row">
                        <div class="col-md-3 col-lg-12">
                           <!-- Card -->
                           <div class="card mb-30">
                              <!-- Social Statics -->
                              <div class="social-statics">
                                 <div class="d-flex align-items-center px-3 py-3">
                                    <h4>Facebook <i class="ml-2 icofont-facebook square"></i></h4>
                                 </div>
                                 <div class="d-flex justify-content-between align-items-center followers">
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Followers</p>
                                       <h3 class="total-fb-follower"><?php echo e(number_format($totalFBFollow)); ?></h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Reach</p>
                                       <h3 class="total-fb-reach"><?php echo e(number_format($totalFBReach)); ?></h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Engagement</p>
                                       <h3 class="total-fb-engagement"><?php echo e(number_format($totalFBEngagement)); ?></h3>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Social Statics -->
                           </div>
                           <!-- End Card -->
                        </div>

                        <div class="col-md-3 col-lg-12">
                           <!-- Card -->
                           <div class="card mb-30">
                              <!-- Social Statics -->
                              <div class="social-statics style--two">
                                 <div class="d-flex align-items-center px-3 py-3">
                                    <h4>X (Twitter) <i class="ml-2 icofont-x square"></i></h4>
                                 </div>
                                 <div class="d-flex justify-content-between align-items-center followers">
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Followers</p>
                                       <h3 class="total-x-follower">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Engagement</p>
                                       <h3 class="total-x-engagement">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Impression</p>
                                       <h3 class="total-x-impression">695k</h3>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Social Statics -->
                           </div>
                           <!-- End Card -->
                        </div>

                        <div class="col-md-3 col-lg-12">
                           <!-- Card -->
                           <div class="card mb-30">
                              <!-- Social Statics -->
                              <div class="social-statics style--three">
                                 <div class="d-flex align-items-center px-3 py-3">
                                    <h4>Instagram <i class="ml-2 icofont-instagram square"></i></h4>
                                 </div>
                                 <div class="d-flex justify-content-between align-items-center followers">
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Followers</p>
                                       <h3 class="total-instagram-follower">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Engagement</p>
                                       <h3 class="total-instagram-engagement">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Impression</p>
                                       <h3 class="total-instagram-impression">695k</h3>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Social Statics -->
                           </div>
                           <!-- End Card -->
                        </div>

                        <div class="col-md-3 col-lg-12">
                           <!-- Card -->
                           <div class="card mb-30">
                              <!-- Social Statics -->
                              <div class="social-statics style--two">
                                 <div class="d-flex align-items-center px-3 py-3">
                                    <h4>Tiktok <i class="ml-2 icofont-tiktok square"></i></h4>
                                 </div>
                                 <div class="d-flex justify-content-between align-items-center followers">
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Followers</p>
                                       <h3 class="total-tiktok-follower">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Engagement</p>
                                       <h3 class="total-tiktok-reach">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Impression</p>
                                       <h3 class="total-tiktok-engagement">695k</h3>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Social Statics -->
                           </div>
                           <!-- End Card -->
                        </div>

                        <div class="col-md-3 col-lg-12">
                           <!-- Card -->
                           <div class="card mb-30">
                              <!-- Social Statics -->
                              <div class="social-statics">
                                 <div class="d-flex align-items-center px-3 py-3">
                                    <h4>Threads</h4>
                                 </div>
                                 <div class="d-flex justify-content-between align-items-center followers">
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Followers</p>
                                       <h3 class="total-threads-follower">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Engagement</p>
                                       <h3 class="total-threads-reach">695k</h3>
                                    </div>
                                    <div class="content">
                                       <p class="font-14 mb-2 l-height1">Impression</p>
                                       <h3 class="total-threads-engagement">695k</h3>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Social Statics -->
                           </div>
                           <!-- End Card -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Main Content -->
      </div>
      <!-- End Main Wrapper -->

      <?php echo $__env->make('parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
   <!-- End wrapper -->

   <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
   <script src="<?php echo e(url('/')); ?>/js/jquery.min.js"></script>
   <script src="<?php echo e(url('/')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo e(url('/')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
   <script src="<?php echo e(url('/')); ?>/js/script.js"></script>
   <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

   <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script src="<?php echo e(url('/')); ?>/vendor/apex/apexcharts.min.js"></script>

   <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script src="<?php echo e(url('/')); ?>/vendor/datatables/datatables.min.js"></script>
   <script>
      var topLimit = 10;

      $('#btnAll').click(function() {
         if(topLimit == 0) return;
         topLimit = 0;
         $('#btnAll').removeClass('bg-success-light text-success');
         $('#btnTop100').addClass('bg-success-light text-success');
         $('#btnTop10').addClass('bg-success-light text-success');
         loadProfileList(topLimit);
      });

      $('#btnTop100').click(function() {
         if(topLimit == 100) return;
         topLimit = 100;
         $('#btnAll').addClass('bg-success-light text-success');
         $('#btnTop100').removeClass('bg-success-light text-success');
         $('#btnTop10').addClass('bg-success-light text-success');
         loadProfileList(topLimit);
      });

      $('#btnTop10').click(function() {
         if(topLimit == 10) return;
         topLimit = 10;
         $('#btnAll').addClass('bg-success-light text-success');
         $('#btnTop100').addClass('bg-success-light text-success');
         $('#btnTop10').removeClass('bg-success-light text-success');
         loadProfileList(topLimit);
      });

      function loadProfileList(limitprofile) {
         var token = "<?php echo e(csrf_token()); ?>";
         var url = "<?php echo e(url('/profilelist')); ?>";

         console.log("Load profile list with limit: " + limitprofile);
      
         $.ajax({
            url: url,
            type: 'POST',
            data: {
               "_token": token,
               "limit": limitprofile
            },
            success: function(data) {
               // Destroy existing DataTable
               if ($.fn.DataTable.isDataTable('#tableProfileList')) {
                  $('#tableProfileList').DataTable().destroy();
               }

               // Update the table body with the new content
               $('#ProfileList').html(data['html']);

               // Reinitialize DataTables
               $('#tableProfileList').DataTable({
                  // Your DataTables options here, for example:
                  paging: true,
                  searching: true
               });

               // Update the other elements with totals
               $('.total-fb-follower').html(formatWithK(Number(data['follow'])));
               $('.total-fb-reach').html(formatWithK(Number(data['reach'])));
               $('.total-fb-engagement').html(formatWithK(Number(data['engagement'])));
            },
            error: function(xhr, status, error) {
               console.error("An error occurred: ", status, error);
            }
         });
      }

      function formatWithK(num) {
         if (num >= 10000) {
            return (num / 1000).toFixed(0) + 'k';
         } else {
            return num.toLocaleString();  // Add thousand separators for numbers less than 50,000
         }
      }

      new DataTable('#tableProfileList', {
         info: true,
         ordering: true,
         paging: true
      });

      var pie2_options = {
        series: [20, 18, 15, 13, 34],
        chart: {
            width: 100 + "%",
            height: 330,
            type: 'pie',
            offsetY: -7,
            offsetX: 5,
        },
        colors: ["#E580FD", "#C491FF","#4C9EFE","#09D1DE", "#FFB959"],
        stroke: {
            show: true,
            width: 1,
            colors: ['transparent']
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '12px',
                colors:['#ffffff'],
            },
            background: {
                enabled: false,
            },
        },
        states: {
            hover: {
                filter: {
                    type: 'darken',
                    value: 0.80,
                }
            },
        },
        legend: {
            position: 'left',
            fontSize: '14px',
            fontFamily: '"Montserrat", sans-serif',
            offsetY: 0,
            labels: {
                colors: "#000"
            },
            itemMargin: {
                horizontal: 4,
                //vertical: 10
            },
            markers: {
                width: 5,
                height: 11,
                radius: 0,
            },
        },
        plotOptions: {
            pie: {
              //customScale: 1.12,
              offsetY: 25,
              offsetX: 85,
            }
        },
        labels: ['Business <span class="bold">1,815</span>', 'Politics  <span class="bold">1,667</span>', 'Sports  <span class="bold">1,423</span>', 'Entertainment  <span class="bold">1,218</span>', 'Others  <span class="bold">3,087</span>'],
        responsive: [{
            breakpoint: 1900,
            options: {
                plotOptions: {
                    pie: {
                      offsetX: 50,
                    }
                },
            }
        },{
            breakpoint: 1700,
            options: {
                chart: {
                    height: 300,
                },
                plotOptions: {
                    pie: {
                      offsetX: 30,
                    }
                },
            }
        },{
            breakpoint: 1500,
            options: {
                plotOptions: {
                    pie: {
                      offsetX: 0,
                    }
                },
            }
        },{
            breakpoint: 1200,
            options: {
                chart: {
                    offsetY: 0,
                    offsetX: 0,
                },
                legend: {
                    position: 'bottom',
                    fontSize: '10px',
                    offsetY: -15,
                },
            }
        }],
      };

      var pie2_chart = new ApexCharts(document.querySelector("#apex_pie2-chart"), pie2_options);
      pie2_chart.render();

      var column_options = {
        series: [{
            name: 'Female',
            data: [0.3, 1.2, 1.1, 2.4, 7.4, 36.8]
        }, {
            name: 'Male',
            data: [0.3, 1.4, 1.7, 3.7, 11.4, 32.3]
        }],
        chart: {
            type: 'bar',
            height: 389,
            toolbar: {
                show: false,
            },
        },
        colors: ['#a0d9f7', '#3d92ca'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ['#a0d9f7', '#3d92ca'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.6,
                stops: [100, 100],
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
            categories: ['18-24', '25-34', '35-44', '45-54', '55-64', '65+'],
        },
        yaxis: {
            tickAmount: 4,
            title: {
                text: '%'
            }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            fontSize: '12px',
            fontFamily: '"Montserrat", sans-serif',
            offsetY: 20,
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
                formatter: function (val) {
                    return val + "%";
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
            }
        ],
      };

      var columnChart = new ApexCharts(document.querySelector("#apex_column-chart"), column_options);
      columnChart.render();

      var donut_options = {
         series: [
         <?php
            foreach($agelist as $data) {
               echo $data['percentage'];
               if ($data != end($agelist)) {
                  echo ",";
               }
            }
         ?>
         ],
         chart: {
            height: 338,
            type: 'donut',
         },
         labels: [
         <?php
            foreach($agelist as $data) {
               echo "'".$data['title'].": <strong>".$data['count']." profile</strong>'";
               if ($data != end($agelist)) {
                  echo ",";
               }
            }            
         ?>
         ],
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
               formatter: function (val) {
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

    var donut_chart = new ApexCharts(document.querySelector("#profile-by-age-chart"), donut_options);
    donut_chart.render();
   </script>
</body>

</html><?php /**PATH D:\API_REQUEST\KMS\KSM2\kms\source\resources\views/index.blade.php ENDPATH**/ ?>