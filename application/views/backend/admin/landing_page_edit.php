<style>
	.nav-tabs{
		border: none;
	}

	.nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
		border: 2px solid #2b6cb0;
		border-color: #fff #fff #2b6cb0;
	}

	.nav-tabs .nav-link.active{
		border: 2px solid #2b6cb0;
		border-color: #fff #fff #2b6cb0;
	}
 
</style>

<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body py-2">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
					<?php echo get_phrase('Edit_landing_page'); ?>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>

<div class="row ">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<h4 class='mb-3'>
					<?php echo get_phrase('edit_landing_page'); ?>
				</h4>
				<form action="<?php echo site_url('admin/landing_pages/update/'.$landing_page['id']); ?>" method="post" enctype="multipart/form-data">

					<div class="form-group mb-3">
						<label for="banner"><?php echo get_phrase('banner'); ?></label>
						<div class="wrapper-image-preview" style="margin-left: -6px;">
							<div class="box" style="width: 100%;">
								<?php $landing_page_url = 'uploads/landing-page/banner/'.$landing_page['banner']; ?>
                                <?php
                                	if(file_exists($landing_page_url) && is_file($landing_page_url)):
                                		$landing_page_url = base_url($landing_page_url);
                                	else:
                                		$landing_page_url = base_url('uploads/landing-page/banner/placeholder.png');
                                	endif;
                                ?>
								<div class="js--image-preview" style="background-image: url('<?php echo $landing_page_url; ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;"></div>
								<div class="upload-options">
									<label for="banner" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('choose_a_banner'); ?> <br> <small>(2000 x 500)</small> </label>
									<input id="banner" style="visibility:hidden; position:absolute" type="file" class="image-upload" name="banner" accept="image/*">
								</div>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label for="title"><?php echo get_phrase('title'); ?></label>
						<input type="text" class="form-control" name="title" id="title" value="<?php echo $landing_page['title']; ?>" placeholder="<?php echo get_phrase('enter_blog_title'); ?>" required>
					</div>

					<div class="form-group">
						<label for="heading"><?php echo get_phrase('heading'); ?></label>
						<textarea class="form-control landing-page" name="heading" style="width: 100%;"><?php echo $landing_page['header']; ?></textarea>
					</div>
 
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active px-2" id="course-overview-tab" data-toggle="tab" href="#course-overview" role="tab"
								aria-controls="course-overview" aria-selected="true">Course Overview</a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2" id="prerequisites-tab" data-toggle="tab" href="#prerequisites" role="tab"
								aria-controls="prerequisites" aria-selected="false">Prerequisites</a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2" id="learn-tab" data-toggle="tab" href="#learn" role="tab"
								aria-controls="learn" aria-selected="false">What Will I Learn</a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2" id="assessment-tab" data-toggle="tab" href="#assessment" role="tab"
								aria-controls="assessment" aria-selected="false">Assessments</a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2" id="eligibility-tab" data-toggle="tab" href="#eligibility" role="tab"
								aria-controls="eligibility" aria-selected="false">Eligibility</a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2" id="lecturers-tab" data-toggle="tab" href="#lecturers" role="tab"
								aria-controls="lecturers" aria-selected="false">Lecturers</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="course-overview" role="tabpanel" aria-labelledby="course-overview-tab">
							<div class="form-group pt-3">
								<textarea name="course-overview" class="landing-page"><?php echo $landing_page['course_overview']; ?></textarea>
							</div>
						</div>
						<div class="tab-pane fade" id="prerequisites" role="tabpanel" aria-labelledby="prerequisites-tab">
							<div class="form-group pt-3">
								<textarea name="prerequisites" class="landing-page"><?php echo $landing_page['prerequisites']; ?></textarea>
							</div>
						</div>
						<div class="tab-pane fade" id="learn" role="tabpanel" aria-labelledby="learn-tab">
							<div class="form-group pt-3">
								<textarea name="learn" class="landing-page"><?php echo $landing_page['learn']; ?></textarea>
							</div>
						</div>
						<div class="tab-pane fade" id="assessment" role="tabpanel" aria-labelledby="assessment-tab">
							<div class="form-group pt-3">
								<textarea name="assessment" class="landing-page"><?php echo $landing_page['assessment']; ?></textarea>
							</div>
						</div>
						<div class="tab-pane fade" id="eligibility" role="tabpanel" aria-labelledby="eligibility-tab">
							<div class="form-group pt-3">
								<textarea name="eligibility" class="landing-page"><?php echo $landing_page['eligibility']; ?></textarea>
							</div>
						</div>
						<div class="tab-pane fade" id="lecturers" role="tabpanel" aria-labelledby="lecturers-tab">
							<div class="form-group pt-3">
								<textarea name="lecturers" class="landing-page"><?php echo $landing_page['lecturers']; ?></textarea>
							</div>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-md-6">
							<div class="form-group">
								<label for="title"><?php echo get_phrase('duration'); ?></label>
								<input type="text" class="form-control" name="duration" id="duration" value="<?php echo $landing_page['duration']; ?>" placeholder="<?php echo get_phrase('duration'); ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="title"><?php echo get_phrase('course_code'); ?></label>
								<input type="text" class="form-control" name="course_code" id="course_code" value="<?php echo $landing_page['course_code']; ?>" placeholder="<?php echo get_phrase('course_code'); ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="title"><?php echo get_phrase('course_credits'); ?></label>
								<input type="text" class="form-control" name="course_credits" id="course_credits" value="<?php echo $landing_page['course_credits']; ?>" placeholder="<?php echo get_phrase('course_credits'); ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="title"><?php echo get_phrase('level'); ?></label>
								<input type="text" class="form-control" name="level" id="level" value="<?php echo $landing_page['level']; ?>" placeholder="<?php echo get_phrase('level'); ?>" required>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">
							<h4>Dates <button type="button" id="addDateField" class="btn ml-2"><i class="fa fa-plus-circle"></i></button></h4>
							<div id="dateFields">
								<div class="d-flex">
									<input type="date" class="form-control date-field" name="date[]" required>
									<a type="button" href="#" class="removeDateField btn btn-danger"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
								</div>
							</div>
							
						</div>
					</div>

					<div class="form-group mt-4">
						<button class="btn btn-success"><?php echo get_phrase('update'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
 

<script>
  $(document).ready(function() {
    var maxFields = 5; // Maximum input fields allowed
    var addButton = $('#addDateField');
    var wrapper = $('#dateFields');
    var fieldHTML = '<div class="d-flex mt-2">' +
                      '<input type="date" class="form-control date-field" name="date[]" required>' +
                      '<a href="#" type="button" class="removeDateField btn btn-danger"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>' +
                    '</div>';

    var x = 1; // Initial field counter
    $(addButton).click(function() {
      if (x < maxFields) {
        x++;
        $(wrapper).append(fieldHTML); // Add field HTML
      }
    });

    // Remove field
    $(wrapper).on('click', '.removeDateField', function(e) {
      e.preventDefault();
      $(this).parent('div').remove(); // Remove field HTML
      x--; // Decrement field counter
    });
  });
</script>