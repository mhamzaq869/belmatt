<!DOCTYPE html>
<html>
<head>
  <title><?php echo json_decode($notification['subject'], true)[$user_type]; ?></title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;">
  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">

    <!-- Logo -->
    <div style="text-align: center; margin-bottom: 20px;">
      <img src="<?= base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="Website Logo" width="250" height="auto">
    </div>

    <!-- Email subject -->
    <?php if(isset($auth_link)): ?>
      <h1 style="color: #333333; font-size: 25px; text-align: center; margin-bottom: 20px;"><?php echo $to_user['first_name'].' '.$to_user['last_name']; ?> has purchased a new course for you</h1>
    <?php else: ?>
      <h1 style="color: #333333; font-size: 25px; text-align: center; margin-bottom: 20px;"><?php echo json_decode($notification['subject'], true)[$user_type]; ?></h1>
    <?php endif; ?>
    
    <!-- Email body -->
    <?php
      $msg = json_decode($notification['template'], true)[$user_type];
      foreach($replaces as $key => $value):
        $msg = str_replace('['.$key.']',$value,$msg);
      endforeach;
    ?>

    <!-- Start and end hidden div are needed for tracking system notification. SO don't remove -->
    <div class="system_notification_start" style="display: none;"></div>
    <div><?php echo $msg; ?></div>
    <div class="system_notification_end" style="display: none;"></div>

    
    <?php if(isset($auth_link)): ?>
      <div><?php echo $to_user['first_name'].' '.$to_user['last_name']; ?> has purchased a course for you, to access that 
        course you have to first <a href="<?php echo site_url('sign_up'); ?>">register</a> yourself in <?= get_settings('system_name'); ?>
        , otherwise you can <a href="<?php echo site_url('login'); ?>">login</a>. </div>
    <?php endif; ?>

    <!-- Email footer -->
    <p style="text-align: center; margin-top: 40px; color: #999999; font-size: 14px;">&copy; <?= date('Y') ?> <?= get_settings('system_name'); ?>. All rights reserved.</p>
  </div>
</body>
</html>
