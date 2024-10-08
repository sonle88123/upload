$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var profileselected;

new DataTable('#tableProfileList', {
  info: true,
  ordering: true,
  paging: true
});

function openProfile(id, geturl) {
  $.ajax({
    url: geturl,
    type: 'POST',
    data: {
      id: id,
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success: function(data) {               
      var profile = data.profile;
      var avatar = data.avatar;
      profileselected = profile;
      $('#profileCode').html(profile.code_profile);
      $('#profileAvatar').attr('src', avatar.url);
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

      if (profile.fb_link != null) {
        $('#profileFacebooklink').attr('href', 'https://facebook.com/' + profile.fb_link);
        $('#profileFacebook').val(profile.fb_link);
      } else {
        $('#profileFacebooklink').attr('href', '#');
        $('#profileFacebook').val('');
      }

      if (profile.x_id != null) {
        $('#profileXlink').attr('href', 'https://x.com/' + profile.x_id);
        $('#profileX').val(profile.x_id);
      } else {
        $('#profileXlink').attr('href', '#');
        $('#profileX').val('');
      }

      if (profile.instagram_id != null) {
        $('#profileInstagramlink').attr('href', 'https://instagram.com/' + profile.instagram_id);
        $('#profileInstagram').val(profile.instagram_id);
      } else {
        $('#profileInstagramlink').attr('href', '#');
        $('#profileInstagram').val('');
      }

      if (profile.tiktok_id != null) {
        $('#profileTiktoklink').attr('href', 'https://tiktok.com/' + profile.tiktok_id);
        $('#profileTiktok').val(profile.tiktok_id);
      } else {
        $('#profileTiktoklink').attr('href', '#');
        $('#profileTiktok').val('');
      }

      if (profile.threads_id != null) {
        $('#profileThreadslink').attr('href', 'https://threads.com/' + profile.threads_id);
        $('#profileThreads').val(profile.threads_id);
      } else {
        $('#profileThreadslink').attr('href', '#');
        $('#profileThreads').val('');
      }
    }
  });
}

$('#btnDetailsave').on('click', function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  if(profileselected == null) {
    return;
  }

  var saveUrl = $(this).data('save-url');  // Get the URL from the data attribute

  $('#btnDetailsave').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>').attr('disabled', 'disabled');

  // Serialize the form data
  // Gather form data
  var formData = {
    _token: $('input[name="_token"]').val(), // CSRF token
    code_profile: profileselected.code_profile,
    content: 'detail',
    fullname: $('#profileFullname').val(),
    job: $('#profileJob').val(),
    age: $('#profileAge').val(),
    pob: $('#profilePoB').val(),
  };

  // Make an AJAX call to save the form data
  $.ajax({
    url: saveUrl,  // Use the URL from the data attribute
    type: 'POST',
    data: formData,
    success: function(response) {
      // Handle success response
      console.log(response);
      $('#btnDetailsave').html('Save').removeAttr('disabled');
      toastr.success("Profile detail saved", "Success");
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.error('Error:', error);
    }
  });
});

$('#btnAppearancesave').on('click', function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  if(profileselected == null) {
    return;
  }

  var saveUrl = $(this).data('save-url');  // Get the URL from the data attribute

  $('#btnAppearancesave').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>').attr('disabled', 'disabled');

  // Serialize the form data
  // Gather form data
  var formData = {
    _token: $('input[name="_token"]').val(), // CSRF token
    code_profile: profileselected.code_profile,
    content: 'appearance',
    skin: $('#profileSkin').val(),
    face: $('#profileFace').val(),
    body: $('#profileBody').val(),
  };

  // Make an AJAX call to save the form data
  $.ajax({
    url: saveUrl,  // Use the URL from the data attribute
    type: 'POST',
    data: formData,
    success: function(response) {
      // Handle success response
      console.log(response);
      $('#btnAppearancesave').html('Save').removeAttr('disabled');
      toastr.success("Profile appearance saved", "Success");
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.error('Error:', error);
    }
  });
});

$('#btnPersonalitysave').on('click', function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  if(profileselected == null) {
    return;
  }

  var saveUrl = $(this).data('save-url');  // Get the URL from the data attribute

  $('#btnPersonalitysave').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>').attr('disabled', 'disabled');

  // Serialize the form data
  // Gather form data
  var formData = {
    _token: $('input[name="_token"]').val(), // CSRF token
    code_profile: profileselected.code_profile,
    content: 'personality',
    lifestyle: $('#profileLifestyle').val(),
    interests: $('#profileInterests').val(),
    tone: $('#profileTone').val(),
    engagement: $('#profileEngagement').val(),
    language: $('#profileLanguage').val(),
  };

  // Make an AJAX call to save the form data
  $.ajax({
    url: saveUrl,  // Use the URL from the data attribute
    type: 'POST',
    data: formData,
    success: function(response) {
      // Handle success response
      console.log(response);
      $('#btnPersonalitysave').html('Save').removeAttr('disabled');
      toastr.success("Profile personality saved", "Success");
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.error('Error:', error);
    }
  });
});

$('btnProfessionalsave').on('click', function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  if(profileselected == null) {
    return;
  }

  var saveUrl = $(this).data('save-url');  // Get the URL from the data attribute

  $('#btnProfessionalsave').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>').attr('disabled', 'disabled');

  // Serialize the form data
  // Gather form data
  var formData = {
    _token: $('input[name="_token"]').val(), // CSRF token
    code_profile: profileselected.code_profile,
    content: 'professional',
    industry: $('#profileIndustry').val(),
    experience: $('#profileExperience').val(),
    content_style: $('#profileContentstyle').val(),
    influence_scope: $('#profileInfluencescope').val(),
  };

  // Make an AJAX call to save the form data
  $.ajax({
    url: saveUrl,  // Use the URL from the data attribute
    type: 'POST',
    data: formData,
    success: function(response) {
      // Handle success response
      console.log(response);
      $('#btnProfessionalsave').html('Save').removeAttr('disabled');
      toastr.success("Profile professional saved", "Success");
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.error('Error:', error);
    }
  });
});

$('#btnSocialsave').on('click', function(e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  if(profileselected == null) {
    return;
  }

  var saveUrl = $(this).data('save-url');  // Get the URL from the data attribute

  $('#btnSocialsave').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>').attr('disabled', 'disabled');

  // Serialize the form data
  // Gather form data
  var formData = {
    _token: $('input[name="_token"]').val(), // CSRF token
    code_profile: profileselected.code_profile,
    content: 'social',
    fb_link: $('#profileFacebook').val(),
    x_id: $('#profileX').val(),
    instagram_id: $('#profileInstagram').val(),
    tiktok_id: $('#profileTiktok').val(),
    threads_id: $('#profileThreads').val(),
  };

  // Make an AJAX call to save the form data
  $.ajax({
    url: saveUrl,  // Use the URL from the data attribute
    type: 'POST',
    data: formData,
    success: function(response) {
      // Handle success response
      console.log(response);
      $('#btnSocialsave').html('Save').removeAttr('disabled');
      toastr.success("Profile social saved", "Success");
    },
    error: function(xhr, status, error) {
      // Handle error response
      console.error('Error:', error);
    }
  });
});