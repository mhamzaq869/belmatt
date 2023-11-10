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
                    <?php echo get_phrase('staff_add_form'); ?>
                </h4>

                <form class="required-form"
                    action="<?php echo site_url('organization/staffs/add'); ?>"
                    enctype="multipart/form-data" method="post">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="first_name"><?php echo get_phrase('first_name'); ?><span
                                        class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="last_name"><?php echo get_phrase('last_name'); ?><span
                                        class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="last_name"><?php echo get_phrase('email'); ?><span
                                        class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('role'); ?>
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select name="role" id="" class="form-control">
                                        <?php foreach($this->user_model->all_org_roles()->result_array() as $role):?>
                                        <option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div> 

                            <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"
                                name="button"><?php echo get_phrase('submit'); ?></button>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>