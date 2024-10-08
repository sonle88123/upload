<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Page Title -->
   <title>Performance Profile | KOLs Management System</title>

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
   <!--link rel="stylesheet" href="{{url('/')}}/fonts/icofont/icofont.min.css"-->
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
                     <h3>Profile Article</h3>
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
                           @foreach($profilelist as $data)
                              <tr id="Profile_{{ $data->id_profile }}" style="cursor: pointer;" onclick="openProfile({{ $data->id_profile }})">
                                 <td>
                                    <img src="{{ $data->imageResource() }}" alt="Avatar of {{ $data->id_profile }}" width="120px">
                                 </td>
                                 <td>
                                    <p>Code: <strong>{{ $data->code_profile }}</strong></p>
                                    <p>Name: <strong>{{ $data->fullname }}</strong></p>
                                    <p>Age: <strong>{{ $data->age }}</strong></p>
                                    <p>Nationality: <strong>{{ $data->nationality }}</strong></p>
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
                        <h4 class="mb-3">Profile Detail of <span id="profileCode">-</span></h4>
                        <div class="row">
                           <div class="col-12">
                              <table id="tableCelebArticle" class="table mb-0 thead-border-top-0">
                                 <thead>
                                    <tr>
                                       <th style="width: 100px;">FNews Link</th>
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>Caption</th>
                                    </tr>
                                 </thead>
                                 <tbody class="list" id="CelebArticleList">
                                 </tbody>
                              </table>
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
   <script src="{{ url('/') }}/vendor/datatables/datatables.min.js"></script>
   <script>
      new DataTable('#tableProfileList', {
            info: true,
            ordering: true,
            paging: true
      });

      function openProfile(id) {
         console.log('{{ url('/profilearticle/getarticle') }}');
         
         $.ajax({
            url: '{{ url('/profilearticle/getarticle') }}',
            type: 'POST',
            data: {
               id: id,
               _token: '{{ csrf_token() }}'
            },
            success: function(data) {
               var article_list = data.articles;
               html = '';

               if (article_list) {
                  for (var i = 0; i < article_list.length; i++) {
                     // Rest of the loop code
                     html += '<tr>';
                     html += '<td><a href="' + article_list[i].fnews_link + '" target="_blank">' + article_list[i].fnews_link + '</a></td>';
                     html += '<td>' + article_list[i].title + '</td>';
                     html += '<td>' + article_list[i].description + '</td>';
                     html += '<td>' + article_list[i].caption + '</td>';
                     html += '</tr>';
                  }
               }

               $('#CelebArticleList').html(html);
            }
         });
      }
   </script>
</body>

</html>