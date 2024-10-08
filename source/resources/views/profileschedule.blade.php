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

   <!-- Favicon -->
   <link rel="shortcut icon" href="{{url('/')}}/trendifavicon.png">

   <!-- Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

   <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
   <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{ url('/') }}/fonts/icofont/icofont.min.css">
   <link rel="stylesheet" href="{{ url('/') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.css">
   <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->
   
   <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
   <link type="text/css" href="{{ url('/') }}/vendor/datatables/datatables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ url('/') }}/vendor/fullcalendar/fullcalendar.min.css">
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
         <div class="main-content d-flex flex-column flex-md-row">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <h3>Profile Schedule</h3>
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

               <div class="row mb-3">
                  <div class="col-12">
                     <div class="card">
                        <!-- User Profile Nav -->
                        <div class="user-profile-nav d-flex justify-content-xl-between align-items-xl-center flex-column flex-xl-row">
                           <!-- Profile Info -->
                           <div class="profile-info d-flex align-items-center">
                              <div class="profile-pic mr-3">
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
                                          <div class="btn-circle mr-20">
                                             <img src="{{ url('/') }}/img/svg/user-check.svg" alt="" class="svg">
                                          </div>
                                          <div class="font-14">
                                             <h4 id="profileFollow">154</h4>
                                             <p class="font-14 text_color">Follower</p>
                                          </div>
                                       </a>
                                    </li>
                              </ul>
                           </div>
                        </div>
                        <!-- End User Profile Nav -->
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-12">
                     <div id="fullcalendar"></div>
                  </div>
               </div>

               <!-- Start fullCalModal -->
               <div id="fullCalModal" class="modal fade">
                  <div class="modal-dialog modal-dialog-centered">
                     <div class="modal-content">
                        <div class="modal-header flex-column border-bottom-0 pt-2 pb-0">
                           <h6 id="modalTitle1">Trendi AI</h6>
                           <p id="modalDate" class="font-14">27 . 05 . 2024</p>
                        </div>
                        <div id="modalBody1" class="modal-body border-bottom-0 pt-0 mt-10">
                           <div class="calendar-modal-location d-flex align-items-center">
                              <span class="icon"><img src="{{ url('/') }}/img/svg/popup-location.svg" class="svg" alt=""></span>
                              <span id="modalLocation" class="content">109 Street No. 1, Cityland Center Hills, Ward 7, Go Vap District, Ho Chi Minh City, Viet Nam</span>
                           </div>
                           <div class="calendar-modal-visibility d-flex align-items-center">
                              <span id="modalDescription" class="content"></span>
                           </div>
                        </div>
                        <div class="modal-footer justify-content-around pb-2 border-top-0">
                           <button class="edit-btn" data-toggle="modal" data-target="#createEventModal" data-dismiss="modal"><i class="icofont-ui-edit"></i> Edit</button>
                           <button type="button" class="delete-btn" data-dismiss="modal"><i class="icofont-ui-delete"></i> Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End fullCalModal -->

               <!-- Start createEventModal -->
               <div id="createEventModal" class="modal fade">
                  <div class="modal-dialog modal-dialog-centered">
                     <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header pb-0 border-bottom-0 flex-column">
                           <div class="custom-select-box d-inline-flex align-items-center m_style">
                              <label for="formGroupExampleInput6"><img src="{{ url('/') }}/img/svg/color.svg" alt="" class="svg"></label>
                              <select id="formGroupExampleInput6">
                                 <option value="travel">Travel</option>
                                 <option value="calendar">Calendar</option>
                                 <option value="birthday">Birthday</option>
                                 <option value="holyday">Holyday</option>
                                 <option value="discovered">Discovered</option>
                                 <option value="meetup">Meetup</option>
                                 <option value="anniversary">Anniversary</option>
                              </select>
                           </div>

                           <div class="calendar-modal-title-wrap w-100 d-flex mt-10">
                              <div class="calendar-modal-title m_style flex-grow">
                                 <label for="formGroupExampleInput"><i class="icofont-tag"></i></label>
                                 <input type="text" id="formGroupExampleInput" placeholder="Ewe fuc dudbared.">
                              </div>

                              <div class="calendar-modal-private m_style">
                                 <i class="icofont-unlock"></i>
                              </div>
                           </div>

                           <button type="button" class="close" data-dismiss="modal">
                              <span aria-hidden="true">×</span>
                              <span class="sr-only">close</span>
                           </button>
                        </div>
                        <!-- End Modal Header -->

                        <!-- Modal Body -->
                        <div id="modalBody2" class="modal-body border-bottom-0 pt-0 pb-0">
                           <form>
                              <div class="calendar-modal-location m_style mt-10">
                                 <label for="formGroupExampleInput1"><i class="icofont-location-pin"></i></label>
                                 <input type="text" id="formGroupExampleInput1" placeholder="502 Ozisa Heights">
                              </div>


                              <div class="calendar-modal-dates mt-10 d-flex">
                                 <div class="calendar-modal-start-date m_style mr-2">
                                    <label for="formGroupExampleInput2"><i class="icofont-calendar"></i></label>
                                    <input type="text" id="formGroupExampleInput2" placeholder="2020-01-13">
                                 </div>
                                 
                                 <div class="calendar-modal-end-date m_style mr-2">
                                    <label for="formGroupExampleInput3"><i class="icofont-calendar"></i></label>
                                    <input type="text" id="formGroupExampleInput3" placeholder="2020-01-13">
                                 </div>
                                 
                                 <div class="calendar-modal-checkbox d-flex align-items-center">
                                    <input type="checkbox" id="formGroupExampleInput4">
                                    <label for="formGroupExampleInput4">All Day</label>
                                 </div>
                              </div>

                              <div class="calendar-modal-state d-inline-flex align-items-center mt-10 m_style">
                                 <label for="formGroupExampleInput5"><i class="icofont-bag-alt"></i></label>
                                 <select id="formGroupExampleInput5" class="m-state">
                                    <option value="busy">Busy</option>
                                    <option value="free">Free</option>
                                 </select>
                              </div>
                           </form>
                        </div>
                        <!-- End Modal Body -->

                        <div class="modal-footer border-top-0 pt-10">
                           <button class="btn">Save</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End createEventModal -->
            </div>
         </div>
         <!-- End Main Content -->
      </div>
      <!-- End Main Wrapper -->

      @include('parts.footer')
   </div>
   <!-- End wrapper -->

   <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
   <script src="{{ url('/') }}/js/jquery.min.js"></script>
   <script src="{{ url('/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="{{ url('/') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
   <script src="{{ url('/') }}/js/script.js"></script>
   <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

   <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script src="{{ url('/') }}/vendor/datatables/datatables.min.js"></script>
   <script src="{{ url('/') }}/vendor/jquery-ui/jquery-ui.min.js"></script>
   <script src="{{ url('/') }}/vendor/moment/moment.min.js"></script>
   <script src="{{ url('/') }}/vendor/fullcalendar/fullcalendar.min.js"></script>
   <!--script src="{{ url('/') }}/vendor/fullcalendar/custom-fullcalendar.js"></script-->
   <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->

   <script>
      $(document).ready(function() {
         new DataTable('#ContentTable', {
            info: true,
            ordering: true,
            paging: true
         });

         $('#typeFilter').on('change', function() {
            var selectedType = $(this).val().toLowerCase();  // Get the selected value and convert to lowercase
            $('#ContentTable tbody tr').filter(function() {
                  var type = $(this).find('td:eq(2)').text().toLowerCase();  // Get the text from the Type column and convert to lowercase
                  if (selectedType !== '') {
                     $(this).toggle(type === selectedType);  // Show/Hide the row based on the match
                  } else {
                     $(this).show();  // If "All Types" is selected, show all rows
                  }
            });
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
            $('#profileAvatar').attr('src', profile.avatar);
            $('#profileFullname').text(profile.fullname);
            $('#profileJob').text(profile.job);
            $('#profileFollow').text(profile.follow);

            $.ajax({
               url: '{{ url('/') }}/profileschedule/' + profile.id_profile,
               type: 'GET',
               success: function(response) {
                  showSchedule(response.profile_schedule);
               },
               error: function(xhr, status, error) {
                  console.log('Error: ' + error);
               }
            });
         }
      });

      var rxhtmlTag = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi;
      jQuery.htmlPrefilter = function( html ) {
         return html.replace( rxhtmlTag, "<$1></$2>" );
      };

      function showSchedule(eventList){
         var calendarEvents = {
            backgroundColor: '#1d7ebd',
            borderColor: '#1d7ebd',
            textColor: '#fff',
            events: []
         };

         eventList.forEach(function(event) {
            var startDate = moment(event.date).format('YYYY-MM-DD') + 'T' + event.start_time;
            var endDate = moment(event.date).format('YYYY-MM-DD') + 'T' + event.end_time;

            calendarEvents.events.push({
               id: event.id_profile_schedule,
               start: startDate,
               end: endDate,
               date: moment(event.date).format('DD . MM . YYYY'),
               title: event.title,
               location: event.location,
               description: event.description
            });
         });

         console.log(calendarEvents);

         // initialize the calendar
         $('#fullcalendar').fullCalendar({
            header: {
               left: 'title,prev,next,today',
               right: 'month,agendaWeek,agendaDay'
            },
            firstDay: 1,
            editable: false,
            droppable: false,
            defaultView: 'agendaWeek',
            eventSources: [calendarEvents],
            eventClick:  function(event, jsEvent, view) {
               $('#modalTitle1').html(event.title);
               $('#modalDate').html(event.date);
               $('#modalLocation').html(event.location);
               $('#modalDescription').html(event.description);
               $('#fullCalModal').modal("show");
            },
            dayClick: function(date, jsEvent, view) {
               $("#createEventModal").modal("show");
            },
         });
      }
   </script>
</body>
</html>