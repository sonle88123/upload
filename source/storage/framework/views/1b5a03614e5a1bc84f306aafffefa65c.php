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
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
   <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/fonts/icofont/icofont.min.css">
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
   <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

   <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <link rel="stylesheet" href="<?php echo e(url('/')); ?>/vendor/dropzone/dropzone.min.css">
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
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h3>Social Post Generation</h3>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="card mb-30 px-3 py-3">
                                <div class="row">
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="ImageFBPostForm" class="row">
                                            <?php echo csrf_field(); ?>
                                            <div class="col-md-6">
                                                <div class="autocomplete mb-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="input-group addon radius-50 ov-hidden">
                                                            <div id="load-profile" class="input-group-prepend">
                                                                <div class="input-group-text bg-light pointer">
                                                                    <img src="<?php echo e(url('/')); ?>/img/svg/search-icon.svg" alt="" class="svg">
                                                                </div>
                                                            </div>
                                                            <input type="text" id="autocomplete-input" class="form-control" placeholder="Profile code">
                                                        </div>
                                                        <div class="background-suggestions"></div>
                                                        <div id="suggestions" class="suggestions"></div>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="form-group mb-4">
                                                    <img id="profileAvatar" src="<?php echo e(url('/')); ?>/img/avatar/avatar-user.png" alt="" class="avatar img-70">
                                                    <input type="text" id="profileCode" class="d-none"></input>
                                                    <h4 id="profileFullname" class="mt-3">Fullname</h4>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="readOnlyTextarea1" class="mb-2 d-block">Prompt to generate image</label>
                                                    <textarea id="SocialPostPrompt" rows="10" class="theme-input-style" placeholder="Enter prompt..."></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <button id="GetPrompt" class="btn bg-light-success">Get Prompt</button>
                                                    <button id="GetPost" class="ml-3 btn">Get Post</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h4>Post result</h4>
                                                    <p id="ImageCaption1"></p>
                                                    <img id="ImageProfile1" src="<?php echo e(url('/')); ?>/img/TrendiTaglineNgang.png" alt="" width=100%>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="card mb-30 px-3 py-3">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <h3>Model Virtual Try-On</h3>
                                    </div>
                                    <div class="col-md-12 mt-3" style="height: 1200px;">
                                        <iframe class="w-100 h-100" style="border: none;" src="https://chrisjohnson111-test333.hf.space/?__theme=light"></iframe>
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
   <script src="<?php echo e(url('/')); ?>/vendor/dropzone/dropzone.min.js"></script>
   <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->

    <script>
        $(document).ready(function() {
            const $input = $('#autocomplete-input');
            const $suggestions = $('#suggestions');
            let suggestions = [];

            // Sample data containing profile information
            var profileList = <?php echo json_encode($profilelist, 15, 512) ?>;

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

                    var $html = '<img src="' + suggestion.avatar + '" class="col-3 ps-1" alt="' + suggestion.fullname + '" width="100%"><div class="col-8 ps-0 pe-0"><span>' + suggestion.code_profile + ' - ' + suggestion.fullname + '</span></div>';

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

                // Handle profile selection
                const $target = $(event.target);
                const profile = suggestions.find(item => item.code_profile === $target.text().split(' - ')[0]);

                if (profile) {
                    $input.val(profile.code_profile);
                    $suggestions.empty();

                    // Fetch profile details
                    $('#profileAvatar').attr('src', profile.avatar);
                    $('#profileCode').text(profile.code_profile);
                    $('#profileFullname').text(profile.fullname);
                }
            });
        });

        $('#GetPrompt').click(function() {
            event.preventDefault();

            var profileCode = $('#profileCode').text();
            console.log(profileCode);
            if (profileCode == '' || profileCode == null) {
                alert('Please select a profile.');
                return;
            }

            $.ajax({
                url: "<?php echo e(url('/generativeai/getpromptsocialpost')); ?>",
                type: 'POST',
                data: {
                    profileCode: profileCode,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    $('#SocialPostPrompt').val(response.prompt);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $('#GetPost').click(function() {
            event.preventDefault();

            var profileCode = $('#profileCode').text();
            var prompt = $('#SocialPostPrompt').val();
            console.log(profileCode);
            console.log(prompt);

            if (profileCode == '' || profileCode == null) {
                alert('Please select a profile.');
                return;
            }

            if (prompt == '' || prompt == null) {
                alert('Please enter a prompt.');
                return;
            }

            $.ajax({
                url: "<?php echo e(url('/generativeai/getsocialpost')); ?>",
                type: 'POST',
                data: {
                    profileCode: profileCode,
                    prompt: prompt,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    console.log(response);
                    $('#ImageCaption1').text(response.imgcap1);
                    $('#ImageProfile1').attr('src', response.img1);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    </script>
</body>

</html><?php /**PATH D:\API_REQUEST\Trending_AI\KSM2\kms\source\resources\views/socialpost.blade.php ENDPATH**/ ?>