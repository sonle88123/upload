
<?php
  $totalFBFollow = 0;
  $totalFBReach = 0;
  $totalFBEngagement = 0;
?>
@foreach($profilelist as $data)
<tr id="Profile_{{ $data->id_profile }}">
  <td>{{ $data->code_profile }}</td>
  <td>
    <strong>{{ $data->fullname }}</strong>
    <ul>
      <li>Age: <strong>{{ $data->age }}</strong></li>
      <li>Occupation: <strong>{{ $data->job }}</strong></li>
      <li>National: <strong>{{ $data->nationality }}</strong></li>
    </ul>
  </td>
  <td>
    <a href="https://facebook.com/{{ $data->fb_link }}" target="_blank">{{ $data->fb_link }}</a>
    <ul>
      <li>Follow: <strong>{{ number_format($data->follow) }}</strong></li>
      <li>Like: <strong>
        <?php
          $engagement = $data->like * 2 + rand(2000, 3000);
          echo number_format($engagement);
        ?>
        </strong></li>
      <li>Post: <strong>{{ number_format($data->post) }}</strong></li>
      <?php
        $totalFBFollow += $data->follow;
        $totalFBReach += $data->like + rand(2000, 3000);
        $totalFBEngagement += $engagement;
      ?>
    </ul>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
@endforeach
<input type="hidden" id="totalFBFollow" value="{{ $totalFBFollow }}">
<input type="hidden" id="totalFBReach" value="{{ $totalFBReach }}">
<input type="hidden" id="totalFBEngagement" value="{{ $totalFBEngagement }}">