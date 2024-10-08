<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Page Title -->
   <title><?php echo e($pagetitle); ?> | KOLs Management System</title>

   <!-- Meta Data -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="KOLs Management System, a product of Trendi AI">
   <meta name="keywords" content="">

   <!-- Favicon -->
   <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/trendifavicon.png">

   <!-- Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
   
   <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/fonts/icofont/icofont.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
   <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

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

                    <div class="card">
                        <div class="pt-40 px-3 px-sm-4 px-md-5 pb-3">
                            <div class="row mb-5">
                                <div class="col">
                                    <p class="mb-3">Under construction</p>
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
</body>

</html><?php /**PATH D:\xampp\htdocs\kms-main\source\resources\views/underconstruction.blade.php ENDPATH**/ ?>