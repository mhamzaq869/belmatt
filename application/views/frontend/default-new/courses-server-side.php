<?php
 $courses = $this->crud_model->get_course_by_type(); 
?>
<!---------- Bread Crumb Area Start ---------->
<?php include "breadcrumb.php"; ?>
<!---------- Bread Crumb Area End ---------->

<!-- Start Course Calendar list -->
<section class="pt-50 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h3 class="mb-3 header-title"><?php echo get_phrase('Book a Course'); ?></h3>
                <form class="row justify-content-center" action="<?php echo site_url('home/course_calendar'); ?>" method="get">
                    
                    <!-- Course Type -->
                    <div class="col-xl-3">
                        <div class="form-group mt-5">
                        <label for="Select Course Title">Select Type</label>
                            <select class="form-control select2" data-toggle="select2" name="type" id='type'>  
                                <option value="<?php echo 'all'; ?>" <?php if ($type == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                                <option value="<?php echo 'classroom'; ?>" <?php if ($type == 'classroom') echo 'selected'; ?>><?php echo get_phrase('classroom'); ?></option>
                                <option value="<?php echo 'live-webinar'; ?>" <?php if ($type == 'live-webinar') echo 'selected'; ?>><?php echo get_phrase('live-webinar'); ?></option>
                            </select>
                        </div>
                    </div> 

                    <!-- Course Status -->
                    <div class="col-xl-3">
                        <div class="form-group mt-5">
                        <label for="Select Course Title">Select Venue</label>
                            <select class="form-control select2" data-toggle="select2" name="venue" id='venue'>  
                                <option value="<?php echo 'all'; ?>" <?php if ($venue == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                                <?php foreach ($courses as $key => $course): ?>
                                    <?php if($course['city'] != null && $course['address']): ?>
                                        <option value="<?php echo $course['city'].','.$course['address']; ?>" <?php if ($venue == $course['city'].','.$course['address']) echo 'selected'; ?>><?php echo get_phrase($course['city']).' ('.get_phrase($course['address']).')'; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?> 
                            </select>
                        </div>
                    </div>

                    <!-- Course Status -->
                    <div class="col-xl-3">
                        <div class="form-group mt-5"> 
                            <label for="Select Course Title">Select Course</label>
                            
                            <?php $categories = $this->crud_model->get_categories()->result_array(); ?>
                            <select name="title" class="form-control select2" id="category" onchange="filterCourse()">
                                <option value="" <?php if (empty($title)) echo 'selected'; ?>>Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <?php $course_number = $this->crud_model->get_active_course_by_category_id($category['id'], 'category_id')->num_rows(); ?>
                                    <option value="main-<?php echo $category['id'] ?>" <?php if ($title == 'main-'.$category['id']) echo 'selected'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                    <?php foreach ($this->crud_model->get_sub_categories($category['id']) as $sub_category): ?>
                                        <?php $course_number = $this->crud_model->get_active_course_by_category_id($sub_category['id'], 'sub_category_id')->num_rows(); ?>
                                        <option value="sub-<?php echo $sub_category['id'] ?>" <?php if ($title == 'sub-'.$sub_category['id']) echo 'selected'; ?>>
                                            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub_category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>

                    <div class="col-xl-3">
                        <label for=".." class="text-white mt-5">..</label>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm btn-primary btn-block" name="button" style="padding:8px 28px !important;"><?php echo get_phrase('search'); ?></button>
                        </div>
                    </div>
                </form>


                <div class="table-responsive-sm mt-4">
                    <table id="course-datatable-server-side" class="table table-striped" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('date'); ?></th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('venue'); ?></th>
                                <th><?php echo get_phrase('time'); ?></th>  
                                <th><?php echo get_phrase('price'); ?></th> 
                                <th><?php echo get_phrase('book'); ?></th>
                            </tr>
                        </thead> 
                    </table>
                    <?php if (count($courses) == 0): ?>
                        <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Tutor list -->