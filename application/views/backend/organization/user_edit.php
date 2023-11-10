<?php
$user_data = $this->db->get_where('users', array('id' => $user_id))->row_array();
$social_links = json_decode($user_data['social_links'], true);
$payment_keys = json_decode($user_data['payment_keys'], true);
$paypal_keys = $payment_keys['paypal'];
$stripe_keys = $payment_keys['stripe'];
$razorpay_keys = $payment_keys['razorpay'];
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3">
                    <?php echo get_phrase('student_edit_form'); ?>
                </h4>

                <form class="required-form"
                    action="<?php echo site_url('organization/users/edit/'.$user_id); ?>"
                    enctype="multipart/form-data" method="post">


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="first_name"><?php echo get_phrase('first_name'); ?>
                                    <span class="required">*</span> </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="<?php echo $user_data['first_name']; ?>"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="last_name"><?php echo get_phrase('last_name'); ?>
                                    <span class="required">*</span> </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="<?php echo $user_data['last_name']; ?>"
                                        required>
                                </div>
                            </div> 
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="last_name"><?php echo get_phrase('email'); ?><span
                                        class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
                                </div>
                            </div>  
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"
                                    name="button"><?php echo get_phrase('submit'); ?></button>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>