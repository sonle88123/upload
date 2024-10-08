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
    <link rel="shortcut icon" href="{{ url('/') }}/trendifavicon.png">

    <!-- Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet" href="{{ url('/') }}/vendor/apex/apexcharts.css">
    <link type="text/css" href="{{ url('/') }}/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/fonts/elegant_icons/elegant-icons.css">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/kms.css">
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
            @include('parts.footer')
        </div>
        <!-- End wrapper -->

        <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
        <script src="{{ url('/') }}/js/jquery.min.js"></script>
        <script src="{{ url('/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('/') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="{{ url('/') }}/js/script.js"></script>
        <!-- ======= END BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

        <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
        <script src="{{ url('/') }}/vendor/datatables/datatables.min.js"></script>
        <!-- ======= END BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
        {{-- <script>
      function openProfile(id) {
         $.ajax({
            url: '{{ url('/profilemanagement/getprofile') }}',
            type: 'POST',
            data: {
               id: id,
               _token: '{{ csrf_token() }}'
            },
            success: function(data) {
               var profile = data.profile;
               var avatar = data.avatar;
               $('#profileCode').html(profile.code_profile);
               $('#profileAvatar').attr('src', avatar['img_link']);
               $('#profileFullname').val(profile.fullname);
               $('#profileJob').val(profile.job);
               $('#profileAge').val(profile.age);
               $('#profilePoB').val(profile.place_of_birth);

               $('#profileSkin').html(profile.skin_color);
               $('#profileFace').html(profile.face);
               $('#profileBody').html(profile.body);

               $('#profileLifestyle').html(profile.lifestyle);
               $('#profileInterests').html(profile.interests);
               $('#profileTone').html(profile.tone);
               $('#profileEngagement').html(profile.engagement);
               $('#profileLanguage').html(profile.language);

               $('#profileIndustry').html(profile.industry);
               $('#profileExperience').html(profile.experience);
               $('#profileContentstyle').html(profile.content_style);
               $('#profileInfluencescope').html(profile.influence_scope);
            }
         });
      }

      $('#ProfileSampleGenForm').submit(function(e) {
         e.preventDefault();

         btn = document.getElementById('GenProfileBtn');
         btn.setAttribute("disabled", true);
         btn.innerHTML = 'Generating...';

         var qtyProfile = $('#qtyProfile').val();
         var profileSample = $('#profileSample').val();

         $.ajax({
            url: '{{ url('/generateprofile/generate') }}',
            type: 'POST',
            data: {
               qtyProfile: qtyProfile,
               profileSample: profileSample,
               _token: '{{ csrf_token() }}'
            },
            success: function(data) {
               var profiles = data.profiles;
               var html = '';
               for (var i = 0; i < profiles.length; i++) {
                  var profile = profiles[i];
                  html += '<tr id="Profile_' + profile.id_profile + '" style="cursor: pointer;" onclick="openProfile(' + profile.id_profile + ')">';
                  html += '<td>';
                  html += '<p>' + profile.code_profile + '</p>';
                  html += '</td>';
                  html += '<td>';
                  html += '<p>' + profile.fullname + '</p>';
                  html += '</td>';
                  html += '</tr>';
               }
               $('#ProfileList').html(html);

               btn.removeAttribute("disabled");
               btn.innerHTML = 'Generate Profile';
            }
         });
      });
   </script> --}}
</body>

</html>
