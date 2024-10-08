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
   <link rel="stylesheet" href="{{ url('/') }}/vendor/toastr/toastr.min.css">
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
                     <h3>{{ $pagetitle }}</h3>
                  </div>

                  <div class="col-md-4">
                     <!-- Card -->
                     <div class="card mb-30 px-3 py-3">
                        <table id="tableProfileList" class="table">
                           <thead>
                              <tr>
                              <th>Avatar</th>
                              <th>Info</th>
                              </tr>
                           </thead>
                           <tbody class="list" id="ProfileList">
                           @foreach($fbpages as $data)
                              <tr id="Page_{{ $data->id_facebook_page }}" style="cursor: pointer;" onclick="openFBPage('{{ $data->page_name }}', '{{ $data->page_id }}', {{ $data->id_model_ai }}, '{{ $data->assistant_id }}', '{{ $data->assistant_background }}', '{{ $data->assistant_context }}')">
                                 <td class="text-center">
                                    <img src="{{ $data->avatar }}" alt="Avatar of {{ $data->page_name }}" width="120px">
                                 </td>
                                 <td>
                                    <p>Page ID: <a href="https://facebook.com/{{ $data->page_id }}" target="_blank"><strong>{{ $data->page_id }}</strong></a></p>
                                    <p>Fullname: <strong>{{ $data->page_name }}</strong></p>
                                    <p>Category: <strong>{{ $data->category }}</strong></p>
                                 </td>
                              </tr>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                     <!-- End Card -->
                  </div>

                  <div class="col-md-8">
                     <!-- Card -->
                     <div class="card mb-30 px-3 py-3">
                        <h4 class="mb-3">Assistant of <span id="profileCode">-</span></h4>
                        <div class="row">
                           <div class="col-md-12">
                              <form id="profileDetailForm" class="row">
                                 @csrf
                                 <div class="form-group mb-3 col-md-6">
                                    <label for="profileFullname" class="mb-2 black">Fullname</label>
                                    <input type="text" class="theme-input-style large" id="profileFullname" placeholder="Fullname">
                                 </div>
                                 <div class="form-group mb-3 col-md-6">
                                    <label for="profileFacebook" class="mb-2 black">Facebook ID</label>
                                    <input type="text" class="theme-input-style large" id="profileFacebook" placeholder="Facebook ID">
                                 </div>
                                 <div class="form-group mb-3 col-md-6">
                                    <label for="profileAssistant" class="mb-2 black">Assistant ID</label>
                                    <input type="text" class="theme-input-style large" id="profileAssistant" placeholder="Assistant ID">
                                 </div>
                                 <div class="form-group mb-3 col-md-4">
                                    <label for="profileModel" class="mb-2 black">Model</label>
                                    <select id="profileModel" class="theme-input-style large">
                                       <option value="0">Select Model</option>
                                       @foreach($modelais as $modelai)
                                          <option value="{{ $modelai->id_model_ai }}">{{ $modelai->title_model_ai }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group mb-3 col-md-2 d-flex align-items-end">
                                    <button id="btnDetailsave" class="btn long" data-save-url="{{ url('/profilemanagement/saveprofile') }}">Save</button>
                                 </div>
                              </form>
                           </div>
                           <div class="col-md-12">
                              <div id="profileInfo" class="accordion">
                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingAppearance">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAppearance" aria-expanded="true" aria-controls="collapseAppearance">
                                          Intructions
                                       </button>
                                    </h2>
                                    <div id="collapseAppearance" class="accordion-collapse collapse" aria-labelledby="headingAppearance" data-bs-parent="#profileInfo">
                                       <div class="accordion-body">
                                          <form id="profileAppearanceform">
                                             @csrf
                                             <div class="form-group mb-4">
                                                <label for="profileBackground" class="mb-2 black d-block">Background</label>
                                                <textarea id="profileBackground" class="theme-input-style">You are Maria Campbell, a 27-year-old fashion designer born in New York, USA. You have a rich background in fashion design, shaped by your upbringing in the vibrant cultural scene of New York. Over the years, you’ve gained extensive experience in the fast-paced fashion industry, mastering both traditional and innovative design techniques. You’re well-versed in community style, understanding the importance of fashion as a means of expression within diverse social groups.</textarea>
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileContext" class="mb-2 black d-block">Context</label>
                                                <textarea id="profileContext" class="theme-input-style">As a dedicated assistant in the world of fashion design, you leverage your extensive expertise to support designers and creative teams. Your deep understanding of contemporary trends, community styles, and technical design skills allows you to provide valuable insights and hands-on assistance. Whether helping with the development of new collections, offering guidance on design principles, or ensuring that the final products align with the latest trends, you play a crucial role in bringing creative visions to life with precision and style.</textarea>
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
                                          Tools
                                       </button>
                                    </h2>
                                    <div id="collapsePersonality" class="accordion-collapse collapse" aria-labelledby="headingPersonality" data-bs-parent="#profileInfo">
                                       <div class="accordion-body">
                                          <form id="profilePersonalityform">
                                             @csrf
                                             <div class="form-group mb-4">
                                                <label for="profileLifestyle" class="mb-2 black d-block">File search</label>
                                                <!-- Dropzone Start -->
                                                <form action="#" id="dropzone01" class="dropzone style--two" method="post" enctype="multipart/form-data">
                                                      <div class="d-flex justify-content-center flex-column align-items-center align-self-center" data-dz-message>
                                                         <div class="dz-message bold c2 mb-3">Click or Drop files here to upload.</div>
                                                            <div class="upload-icon">
                                                            <img src="{{ url('/') }}/img/svg/upload-down.svg" alt="" class="svg">
                                                         </div>
                                                      </div>
                                                </form>
                                                <!-- Dropzone End -->
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileTone" class="mb-2 black d-block">Functions</label>
                                                <div id="assistantFunctions" class="w-100">
                                                   <div class="d-flex align-items-center mr-sm-5 mb-3">
                                                      <!-- Custom Checkbox -->
                                                      <label class="custom-checkbox position-relative mr-2">
                                                            <input type="checkbox" id="check4">
                                                            <span class="checkmark"></span>
                                                      </label>
                                                      <!-- End Custom Checkbox -->
                                                      
                                                      <label for="check4">Submit top 5 featured posts after every 3 conversations</label>
                                                   </div>

                                                   <div class="d-flex align-items-center mr-sm-5 mb-3">
                                                      <!-- Custom Checkbox -->
                                                      <label class="custom-checkbox position-relative mr-2">
                                                            <input type="checkbox" id="check5">
                                                            <span class="checkmark"></span>
                                                      </label>
                                                      <!-- End Custom Checkbox -->
                                                      
                                                      <label for="check5">Send product link when asking for quote</label>
                                                   </div>

                                                   <div class="d-flex align-items-center mr-sm-5 mb-3">
                                                      <!-- Custom Checkbox -->
                                                      <label class="custom-checkbox position-relative mr-2">
                                                            <input type="checkbox" id="check4">
                                                            <span class="checkmark"></span>
                                                      </label>
                                                      <!-- End Custom Checkbox -->
                                                      
                                                      <label for="check4">Trendi Virtual Try-on</label>
                                                   </div>
                                                </div>
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
                                          Model configuration
                                       </button>
                                    </h2>
                                    <div id="collapseProfessional" class="accordion-collapse collapse" aria-labelledby="headingProfessional" data-bs-parent="#profileInfo">
                                       <div class="accordion-body">
                                          <form id="profileProfessionalform">
                                             @csrf
                                             <div class="form-group mb-4">
                                                <label for="profileExperience" class="mb-2 black d-block">Temperature</label>
                                                <input type="number" id="profileExperience" class="theme-input-style" value="1">
                                             </div>
                                             <div class="form-group mb-4">
                                                <label for="profileContentstyle" class="mb-2 black d-block">Top P</label>
                                                <input type="number" id="profileExperience" class="theme-input-style" value="1">
                                             </div>
                                             <div class="form-row text-end">
                                                <button id="btnProfessionalsave" class="btn long" data-save-url="{{ url('/profilemanagement/saveprofile') }}">Save</button>
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
   <script src="{{ url('/') }}/vendor/toastr/toastr.min.js"></script>
   <!-- ======= END BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->

   <script>
      $(document).ready(function() {
         $('#tableProfileList').DataTable();
      });

      function openFBPage(fullname, pageid, model, assistant, background, context) {
         $('#profileCode').text(fullname);
         $('#profileFullname').val(fullname);
         $('#profileFacebook').val(pageid);
         $('#profileAssistant').val(assistant);
         $('#profileModel').val(model);
         $('#profileBackground').val(background);
         $('#profileContext').val(context);
      }
   </script>
</body>

</html>