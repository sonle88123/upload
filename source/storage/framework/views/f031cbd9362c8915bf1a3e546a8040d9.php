
<?php
  $totalFBFollow = 0;
  $totalFBReach = 0;
  $totalFBEngagement = 0;
?>
<?php $__currentLoopData = $profilelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="Profile_<?php echo e($data->id_profile); ?>">
  <td><?php echo e($data->code_profile); ?></td>
  <td>
    <strong><?php echo e($data->fullname); ?></strong>
    <ul>
      <li>Age: <strong><?php echo e($data->age); ?></strong></li>
      <li>Occupation: <strong><?php echo e($data->job); ?></strong></li>
      <li>National: <strong><?php echo e($data->nationality); ?></strong></li>
    </ul>
  </td>
  <td>
    <a href="https://facebook.com/<?php echo e($data->fb_link); ?>" target="_blank"><?php echo e($data->fb_link); ?></a>
    <ul>
      <li>Follow: <strong><?php echo e(number_format($data->follow)); ?></strong></li>
      <li>Like: <strong>
        <?php
          $engagement = $data->like * 2 + rand(2000, 3000);
          echo number_format($engagement);
        ?>
        </strong></li>
      <li>Post: <strong><?php echo e(number_format($data->post)); ?></strong></li>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<input type="hidden" id="totalFBFollow" value="<?php echo e($totalFBFollow); ?>">
<input type="hidden" id="totalFBReach" value="<?php echo e($totalFBReach); ?>">
<input type="hidden" id="totalFBEngagement" value="<?php echo e($totalFBEngagement); ?>"><?php /**PATH D:\xampp\htdocs\kms-main\source\resources\views/partials/profilelist.blade.php ENDPATH**/ ?>