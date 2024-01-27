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
                    <?php echo get_phrase('student_add_form'); ?>
                </h4>

                <form class="required-form"
                    action="<?php echo site_url('organization/users/add'); ?>"
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
                                    for="last_name"><?php echo get_phrase('user_name'); ?><span
                                        class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="user_name" name="username" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="last_name"><?php echo get_phrase('email'); ?> </label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label"
                                    for="last_name"><?php echo get_phrase('password'); ?> </label>
                                <div class="col-md-9">
                                    <div class="position-relative"> 
                                        <input class="form-control" id="password" type="text" name="password" placeholder="<?php echo get_phrase('Enter your valid password'); ?>">
                                        <!-- <i class="fa-solid fas fa-eye cursor-pointer" onclick="if($('#password').attr('type') == 'text'){$('#password').attr('type', 'password');}else{$('#password').attr('type', 'text');} $(this).toggleClass('fa-eye'); $(this).toggleClass('fa-eye-slash') " style="right: 20px; left: unset;"></i> -->
                                    </div> 
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

<script>
    function generatePassword(passwordLength) {
  var numberChars = "0123456789";
  var upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  var lowerChars = "abcdefghijklmnopqrstuvwxyz";
  var allChars = numberChars + upperChars + lowerChars;
  var randPasswordArray = Array(passwordLength);
  randPasswordArray[0] = numberChars;
  randPasswordArray[1] = upperChars;
  randPasswordArray[2] = lowerChars;
  randPasswordArray = randPasswordArray.fill(allChars, 3);
  return shuffleArray(randPasswordArray.map(function(x) { return x[Math.floor(Math.random() * x.length)] })).join('');
}

function shuffleArray(array) {
  for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = array[i];
    array[i] = array[j];
    array[j] = temp;
  }
  return array;
}

$("#password").val(generatePassword(12));
</script>