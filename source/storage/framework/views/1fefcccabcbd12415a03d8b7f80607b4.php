<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title>Login | KOLs Management System</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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

    <div class="mn-vh-100 d-flex align-items-center">
        <div class="container">
            <!-- Card -->
            <div class="card justify-content-center auth-card">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <h4 class="mb-5 font-20">Welcome To KOLs Management System</h4>

                        <form name="login-form" id="login-form" action="<?php echo e(url('/')); ?>/auth/postlogin" method="POST">
                        <?php echo csrf_field(); ?>
                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                <label for="email" class="mb-2 font-14 bold black">Email Address</label>
                                <input type="email" id="email" name="email" class="theme-input-style" placeholder="Email Address">
                            </div>
                            <!-- End Form Group -->
                            
                            <!-- Form Group -->
                            <div class="form-group mb-20">
                                <label for="password" class="mb-2 font-14 bold black">Password</label>
                                <input type="password" id="password" name="password" class="theme-input-style" placeholder="********">
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-between mb-20">
                                <div class="d-flex align-items-center">
                                    <!-- Custom Checkbox -->
                                    <label class="custom-checkbox position-relative mr-2">
                                        <input type="checkbox" id="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <!-- End Custom Checkbox -->
                                    
                                    <label for="checkbox" class="font-14">Remember Me</label>
                                </div>

                                <a href="forget-pass.html" class="font-12 text_color">Forgot Password?</a>
                            </div>

                            <div class="mb-30 d-none">
                                <a href="#" class="light-btn mr-3 mb-20">Log In With Facebook</a>
                                <a href="#" class="light-btn style--two mb-20">Log In With Gmail</a>
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn long mr-20">Log In</button>
                            </div>
                        </form>
                    </div>                                    
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>

    <?php echo $__env->make('parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
    <script src="<?php echo e(url('/')); ?>/js/jquery.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/js/script.js"></script>
    <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

    <script>
        $(document).ready(function() {
            // Set CSRF token header for every AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</body>

</html><?php /**PATH D:\xampp\htdocs\kms-main\source\resources\views//login.blade.php ENDPATH**/ ?>