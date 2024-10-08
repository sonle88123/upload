<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title>Generate Profile | KOLs Management System</title>

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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/apex/apexcharts.css">
    <link type="text/css" href="<?php echo e(url('/')); ?>/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/fonts/elegant_icons/elegant-icons.css">
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
            <div class="main-content d-flex flex-column">
                <div class="container-fluid p-0 flex-grow-1 d-flex flex-column">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h3>Virtual</h3>
                        </div>
                    </div>
                    <div class="row flex-grow-1">
                        <div class="col-12 p-0 h-100">
                            <iframe class="w-100 h-100" style="border: none;" src="https://chrisjohnson111-test333.hf.space/?__theme=light"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
            <?php echo $__env->make('parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- End wrapper -->

        <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
        <script src="<?php echo e(url('/')); ?>/js/jquery.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/script.js"></script>
        <!-- ======= END BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

        <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
        <script src="<?php echo e(url('/')); ?>/vendor/datatables/datatables.min.js"></script>
        <!-- ======= END BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
        
</body>

</html>
<?php /**PATH D:\API_REQUEST\KMS\KSM2\kms\source\resources\views/virtual.blade.php ENDPATH**/ ?>