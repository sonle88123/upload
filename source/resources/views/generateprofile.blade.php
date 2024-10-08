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
   <link rel="shortcut icon" href="{{url('/')}}/trendifavicon.png">

   <!-- Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
   
   <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
   <link rel="stylesheet" href="{{url('/')}}/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{url('/')}}/fonts/icofont/icofont.min.css">
   <link rel="stylesheet" href="{{url('/')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
   <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->
   
   <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <link rel="stylesheet" href="{{ url('/') }}/vendor/apex/apexcharts.css">
   <link type="text/css" href="{{ url('/') }}/vendor/datatables/datatables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ url('/') }}/fonts/elegant_icons/elegant-icons.css">
   <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

   <!-- ======= MAIN STYLES ======= -->
   <link rel="stylesheet" href="{{url('/')}}/css/style.css">
   <link rel="stylesheet" href="{{url('/')}}/css/kms.css">
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
                  <div class="col-12 mb-3">
                     <h3>Generate Profile</h3>
                  </div>

                  <div class="col-md-4">
                     <!-- Card -->
                     <div class="card mb-30 px-3 py-3">
                        <form id="ProfileSampleGenForm" action="{{ url('/') }}/gen-profile-sample" method="POST">
                           @csrf
                           <div class="form-group mb-3">
                              <label for="qtyProfile" class="mb-2">Qty of Profile</label>
                              <input id="qtyProfile" type="text" class="form-control" value="1" data-mask="#.##0" data-mask-reverse="true" autocomplete="off">
                           </div>
                           <div class="form-group mb-3">
                              <label for="profileSample" class="mb-2">Profile Sample</label>
                              <textarea id="profileSample" class="theme-input-style" style="height: 300px;">full name; age (between 18 - 40); gender (only women); place of birth (from United State, Latin American countries, Euro); nationality; job; facial description; description of skin color; short paragraph of 10 words describing the character's body (chest, waist, buttocks, no detailed measurements); short paragraph of 10 words describing: lifestyle, interests, tone, engagement, language (mother tongue, language proficiency, secondary language), industry, experience, contentstyle, influencescope</textarea>
                           </div>
                              
                           <button id="GenProfileBtn" type="submit" class="btn btn-primary mb-3">Generate Profile</button>
                        </form>
                        <table id="tableProfileList" class="table">
                           <thead>
                              <tr>
                              <th>Code</th>
                              <th>Fullname</th>
                              </tr>
                           </thead>
                           <tbody class="list" id="ProfileList">
                           </tbody>
                        </table>
                     </div>
                     <!-- End Card -->
                  </div>

                  <div class="col-md-8">
                     <!-- Card -->
                     <div class="card mb-30 px-3 py-3">
                        <h4 class="mb-3">Profile Detail of <span id="profileCode">-</span></h4>
                        <div class="row">
                           <div class="col-md-4">
                              <form id="profileDetailForm">
                                 @csrf
                                 <img id="profileAvatar" src="{{url('/')}}/TrendiLogo900.jpg" alt="Avatar" width="100%">
                                 <div class="form-group mt-3">
                                    <label for="default1" class="mb-2 black">Fullname</label>
                                    <input type="text" class="theme-input-style large" id="profileFullname" placeholder="Fullname">
                                 </div>
                                 <div class="form-group mt-3">
                                    <label for="default1" class="mb-2 black">Occupation</label>
                                    <input type="text" class="theme-input-style" id="profileJob" placeholder="Occupation">
                                 </div>
                                 <hr>
                                 <div class="input-group addon mt-3">
                                    <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="icofont-birthday-cake"></i></div>
                                    </div>
                                    <input type="text" id="profileAge" class="form-control px-2" placeholder="Age">
                                 </div>
                                 <div class="input-group addon mt-3">
                                    <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="icon_house_alt"></i></div>
                                    </div>
                                    <input type="text" id="profilePoB" class="form-control px-2" placeholder="Place of Birth">
                                 </div>
                                 <div class="form-group mt-3">
                                    <button id="btnDetailsave" class="btn long" data-save-url="{{ url('/profilemanagement/saveprofile') }}">Save</button>
                                 </div>
                              </form>
                           </div>
                           <div class="col-md-8">
                              <div id="profileInfo" class="accordion">
                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingAppearance">
                                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAppearance" aria-expanded="true" aria-controls="collapseAppearance">
                                          Appearance
                                       </button>
                                    </h2>
                                    <div id="collapseAppearance" class="accordion-collapse collapse show" aria-labelledby="headingAppearance" data-bs-parent="#profileInfo">
                                       <div class="accordion-body">
                                          <form id="profileAppearanceform">
                                             @csrf
                                             <div class="form-group mb-4">
                                                <label for="profileSkin" class="mb-2 black d-block">Skin color</label>
                                                <textarea id="profileSkin" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileFace" class="mb-2 black d-block">Face</label>
                                                <textarea id="profileFace" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileBody" class="mb-2 black d-block">Body</label>
                                                <textarea id="profileBody" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-row text-end">
                                                <button id="btnAppearancesave" class="btn long" data-save-url="{{ url('/profilemanagement/saveprofile') }}">Save</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPersonality">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePersonality" aria-expanded="false" aria-controls="collapsePersonality">
                                          Personality
                                       </button>
                                    </h2>
                                    <div id="collapsePersonality" class="accordion-collapse collapse" aria-labelledby="headingPersonality" data-bs-parent="#profileInfo">
                                       <div class="accordion-body">
                                          <form id="profilePersonalityform">
                                             @csrf
                                             <div class="form-group mb-4">
                                                <label for="profileLifestyle" class="mb-2 black d-block">Lifestyle</label>
                                                <textarea id="profileLifestyle" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileInterests" class="mb-2 black d-block">Interests</label>
                                                <textarea id="profileInterests" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileTone" class="mb-2 black d-block">Tone</label>
                                                <textarea id="profileTone" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileEngagement" class="mb-2 black d-block">Engagement</label>
                                                <textarea id="profileEngagement" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileLanguage" class="mb-2 black d-block">Language</label>
                                                <textarea id="profileLanguage" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-row text-end">
                                                <button id="btnPersonalitysave" class="btn long" data-save-url="{{ url('/profilemanagement/saveprofile') }}">Save</button>
                                             </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingProfessional">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProfessional" aria-expanded="false" aria-controls="collapseProfessional">
                                          Professional Background
                                       </button>
                                    </h2>
                                    <div id="collapseProfessional" class="accordion-collapse collapse" aria-labelledby="headingProfessional" data-bs-parent="#profileInfo">
                                       <div class="accordion-body">
                                          <form id="profileProfessionalform">
                                             @csrf
                                             <div class="form-group mb-4">
                                                <label for="profileIndustry" class="mb-2 black d-block">Industry</label>
                                                <textarea id="profileIndustry" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileExperience" class="mb-2 black d-block">Experience</label>
                                                <textarea id="profileExperience" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileContentstyle" class="mb-2 black d-block">Content Style</label>
                                                <textarea id="profileContentstyle" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileInfluencescope" class="mb-2 black d-block">Influence Scope</label>
                                                <textarea id="profileInfluencescope" class="theme-input-style"></textarea>
                                             </div>
                                             <div class="form-row text-end">
                                                <button id="btnProfessionalsave" class="btn long" data-save-url="{{ url('/profilemanagement/saveprofile') }}">Save</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSocialmedia">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSocialmedia" aria-expanded="false" aria-controls="collapseSocialmedia">
                                          Social Media Accounts
                                       </button>
                                    </h2>
                                    <div id="collapseSocialmedia" class="accordion-collapse collapse" aria-labelledby="headingSocialmedia" data-bs-parent="#profileInfo">
                                       <div class="accordion-body">
                                          <form id="profileSocialform">
                                             @csrf
                                             <div class="input-group addon">
                                                <div class="input-group-prepend">
                                                   <div class="input-group-text"><a id="profileFacebooklink" href="#" target="_blank"><i class="icofont-facebook"></i></a></div>
                                                </div>
                                                <input type="text" id="profileFacebook" class="form-control" placeholder="Facebook UID">
                                             </div>
                                             <div class="input-group addon mt-3">
                                                <div class="input-group-prepend">
                                                   <div class="input-group-text"><a id="profileInstagramlink" href="#" target="_blank"><i class="icofont-instagram"></i></a></div>
                                                </div>
                                                <input type="text" id="profileInstagram" class="form-control" placeholder="Instagram UID">
                                             </div>
                                             <div class="input-group addon mt-3">
                                                <div class="input-group-prepend">
                                                   <div class="input-group-text"><a id="profileXlink" href="#" target="_blank"><i class="icofont-x"></i></a></div>
                                                </div>
                                                <input type="text" id="profileX" class="form-control" placeholder="X UID">
                                             </div>
                                             <div class="input-group addon mt-3">
                                                <div class="input-group-prepend">
                                                   <div class="input-group-text"><a id="profileTiktoklink" href="#" target="_blank"><i class="icofont-tiktok"></i></a></div>
                                                </div>
                                                <input type="text" id="profileTiktok" class="form-control" placeholder="TikTok UID">
                                             </div>
                                             <div class="input-group addon mt-3">
                                                <div class="input-group-prepend">
                                                   <div class="input-group-text"><a id="profileThreadslink" href="#" target="_blank">T</a></div>
                                                </div>
                                                <input type="text" id="profileThreads" class="form-control" placeholder="Threads UID">
                                             </div>
                                             <div class="form-row text-end mt-3">
                                                <button id="btnSocialsave" class="btn long" data-save-url="{{ url('/profilemanagement/saveprofile') }}">Save</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>                       
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
   <!-- ======= END BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

   <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script src="{{ url('/') }}/vendor/datatables/datatables.min.js"></script>
   <!-- ======= END BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script>
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
   </script>
</body>

</html>