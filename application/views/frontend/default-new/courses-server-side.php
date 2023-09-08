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
                <form class="row justify-content-center" action="<?php echo site_url('home/get_courses'); ?>" method="get">
                     <!-- Course Status -->
                     <div class="col-xl-5">
                        <div class="form-group mt-5">
                            <select class="form-control select2" data-toggle="select2" name="venue" id='venue'>
                                <option selected disabled><?php echo get_phrase('Select Venue'); ?></option>
                                <?php foreach ($courses as $key => $course): ?>
                                    <option value="<?php echo $course['city'].','.$course['address']; ?>"><?php echo get_phrase($course['city']).' ('.get_phrase($course['address']).')'; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Course Status -->
                    <div class="col-xl-5">
                        <div class="form-group mt-5"> 
                            <select class="form-control select2" data-toggle="select2" name="title" id='title'>
                                <option selected disabled><?php echo get_phrase('Select Course'); ?></option>
                                <?php foreach ($courses as $key => $course): ?>
                                    <option value="<?php echo $course['title']; ?>"><?php echo get_phrase($course['title']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-2">
                        <label for=".." class="text-white mt-4">..</label>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary btn-block" name="button" style="padding:8px 28px !important;"><?php echo get_phrase('filter'); ?></button>
                        </div>
                    </div>
                </form>


                <div class="table-responsive-sm mt-4">
                    <table id="course-datatable-server-side" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Tutor list -->