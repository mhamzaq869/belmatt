<!---------- Banner Section Start ---------------->
<section class="h-1-banner bannar-area pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 order-md-1 order-sm-2 order-2">
                <div class="h-1-banner-text mb-3">
                    <?php
                        $banner_title = site_phrase(get_frontend_settings('banner_title'));
                        $banner_title_arr = explode(' ', $banner_title);
                    ?>
                    <h1>
                        <?php
                        foreach($banner_title_arr as $key => $value){
                            if($key == count($banner_title_arr) - 1){
                                echo '<span class="d-inline-block">'.$value.'</span>';
                            }else{
                                echo $value.' ';
                            }
                        }
                        ?>
                    </h1>
                    <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                </div>
                <div class="search-option">
                    <form action="<?php echo site_url('home/search'); ?>" method="get">
                        <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                        <button class="submit-cls" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
                    </form>
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 order-md-2 order-sm-1 order-1 pt-0 pt-md-5 ">
                <!--<div id="tilt" style="background-image: url('<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>');"></div>-->
                <style>

@media only screen and (max-width: 600px) {
  
}
.img-slider{
    overflow: hidden;
    display: block;
    margin-top: 20px;
    width: auto;
    height:auto;
    border: 1px ;
    border-radius: 8px;
    box-shadow: 10px 25px 30px rgba(164 164 233 / 29%);
}
.wrapper{
    width: 100%;
    display: flex;
    animation: slide 10s infinite;
}
@keyframes slide{
    0%{
        transform: translateX(0);
    }
    25%{
        transform: translateX(0);
    }
    30%{
        transform: translateX(-100%);
    }
    50%{
        transform: translateX(-100%);
    }
    55%{
        transform: translateX(-200%);
    }
    75%{
        transform: translateX(-200%);
    }
    80%{
        transform: translateX(-300%);
    }
    100%{
        transform: translateX(-300%);
    }
}
img{
    width: 100%;
}
          
    </style>
  </head>
  <body>
     <div class="img-slider">
        <div class="wrapper">
          <img alt="" src="https://harrisarshad.com/bellmatt/uploads/thumbnails/images/main2.jpg">
          <img alt="" src="https://harrisarshad.com/bellmatt/uploads/thumbnails/images/main23.jpg">
          <img alt="" src="https://harrisarshad.com/bellmatt/uploads/thumbnails/images/main24.jpg">
          <img alt="" src="https://harrisarshad.com/bellmatt/uploads/thumbnails/images/main25.jpg">
           <img alt="" src="https://harrisarshad.com/bellmatt/uploads/thumbnails/images/cover.png">
            <img alt="" src="https://harrisarshad.com/bellmatt/uploads/thumbnails/images/image1.webp">
        </div>
    </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-6">
                <div class="students-rating">
                    <div class="row">
                        <!--<div class="col-lg-3 col-md-3 col-sm-3 col-3">-->
                        <!--    <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>-->
                        <!--    <h1><?php echo nice_number($all_students->num_rows()); ?>+</h1>-->
                        <!--</div>-->
                        <!--<div class="col-lg-2 col-md-2 col-sm-2 col-2">-->
                        <!--    <p><?php echo get_phrase('Happy') ?></p>-->
                        <!--    <p><?php echo get_phrase('Students') ?></p>-->
                        <!--</div> -->
                        <!--<div class="col-lg-2 col-md-2 col-sm-2 col-2">-->
                        <!--    <img src="<?php echo base_url('assets/frontend/default-new/image/h-1-ban-st.png')?>">-->
                        <!--</div>-->
                        <!--<div class="col-lg-2 col-md-2 col-sm-2 col-2">-->
                        <!--    <?php $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]); ?>-->
                        <!--    <h1><?php echo nice_number($all_instructor->num_rows()); ?>+</h1>-->
                        <!--</div>-->
                        <!--<div class="col-lg-3 col-md-3 col-sm-3 col-3">-->
                        <!--    <p><?php echo get_phrase('Experienced') ?></p>-->
                        <!--    <p><?php echo get_phrase('Instructors') ?></p>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- New Section Start -->
<section style="background-color: #ffffff; padding: 100px 0;">
    <div class="container">
        <div class="row">
            <!-- Right Column -->
            <div class="col-lg-6">
                <div class="row">
                    <!-- Static Boxes -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/course/mandatory-training-for-doctors-and-ahps-ss0622dr/98" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-american-sign-language-interpreting"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Mandatory Training for Doctors and AHPS</h5>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/course/mandatory-training-for-healthcare-assistants-ss0622hca/100" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-tarp-droplet"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Mandatory Training for HCAS</h5>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/course/mandatory-training-for-nurses-ss2022n/102" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-first-aid"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Mandatory Training for Nurses</h5>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses?category=mental-health" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-female"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Mandatory Training for Mental Health</h5>
                        </a>
                    </div>
                    
                    <!-- Add more static boxes as needed -->
                    
                </div>
            </div>
            
            <!-- Left Column -->
            <div class="col-lg-6 ">
                <h2 style="font-weight: 700; color: #1e293b; padding-bottom: 12px">Mandatory Training</h2>
                <p>The mandatory training for health and social care is suitable for healthcare professionals and staff  requiring their yearly mandatory training. This course is delivered as a series of eLearning and self directed recorded presentations delivered by specialists in the field. Mandatory training for health and social care is fundamental for all staff working with patients, including those undertaking remote consultations.</p>
                <br>
                <p>You can enroll on a single learning unit or access all the mandatory training sessions as a bundle. This allows you the flexibility to choose which sessions you need.</p>
                <br>
                    <a href="https://harrisarshad.com/bellmatt/home/courses/mandatory-training-for-health-and-social-care" class="btn btn-primary" target="_blank">Learn More</a>
            </div>
        </div>
    </div>
</section>
<!-- New Section End -->


<!-- New Section Start -->
<section style="background-color: #f8f7ff; padding: 100px 0;">
    <div class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-6">
                <h2 style="font-weight: 700; color: #1e293b; padding-bottom: 12px">Advanced Practice</h2>
                <p>Our Advanced practice courses provide an inter-professional programme that allows you to focus on specific courses/workshops that are the core principles of advanced practice and include professionalism, leadership, inter-professional communication, and service development. The modules below have been identified as recommended courses for pharmacists new to general practice and primary care settings.</p>
                <br>
                                <p>The modules below have been identified as recommended courses for pharmacists new to general practice and primary care settings.</p>

            </div>
            
            <!-- Right Column -->
            <div class="col-lg-6">
                <div class="row">
                    <!-- Static Boxes -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/advanced-practice-minor-illness-course" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-disease"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Minor Illness</h5>
                        </a>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/advanced-practice-minor-injuries-courses" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-user-injured"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Minor Injuries</h5>
                        </a>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/paediatric-courses-for-urgent-and-primary-care" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-child"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Paediatrics</h5>
                        </a>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/triage" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-tty"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Triage</h5>
                        </a>
                    </div>
                    
                    <!-- Add more static boxes as needed -->
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- New Section End -->

<!-- New Section Start -->
<section style="background-color: #ffffff; padding: 100px 0;">
    <div class="container">
        <div class="row">
            <!-- Right Column -->
            <div class="col-lg-6">
                <div class="row">
                    <!-- Static Boxes -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/general-practice" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-american-sign-language-interpreting"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Introduction to General Practice</h5>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/blood-results-interpretation" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-tarp-droplet"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Blood Results Interpretation</h5>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/chronic-disease-courses" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-first-aid"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Chronic Disease Management</h5>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <a href="/bellmatt/home/courses/mental-health-in-primary-care-" class="category-product-body position-relative" style="box-shadow: rgba(100, 100, 111, 0.24) 0px 7px 29px 0px; background-image: linear-gradient(to right, #5d184a, #662c91, #194582); border-radius: 10px; padding: 15px 20px; margin: 10px; transition: .5s; width: 100%; border: 1px solid #ffffff;">
                            <div class="cate-icon" style="color: #ffffff;">
                                <i class="fas fa-female"></i>
                            </div>
                            <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span>
                            <h5 class="pt-0" style="color: #fff; font-size: 16px; line-height: 24px; font-weight: 600; margin-top: 12px;">Mental Health in Primary Care</h5>
                        </a>
                    </div>
                    
                    <!-- Add more static boxes as needed -->
                    
                </div>
            </div>
            
            <!-- Left Column -->
            <div class="col-lg-6 ">
                <h2 style="font-weight: 700; color: #1e293b; padding-bottom: 12px">General Practice</h2>
                <p>Our General Practice healthcare course offers comprehensive training in primary care, focusing on foundational principles for healthcare professionals. Participants gain essential skills in preventive medicine, patient communication, and the management of common illnesses, emphasizing the importance of patient-centered care and continuity.</p>
                <br>
                <p>TheThe course equips healthcare professionals to excel in the dynamic field of general practice.</p>
            </div>
        </div>
    </div>
</section>
<!-- New Section End -->



<!---------- Latest courses Section start --------------->
<section class="courses grid-view-body pb-4">
    <div class="container">
        <h1 class="text-center"><span><?php echo site_phrase('Explore') . ' ' . site_phrase('learning'); ?></span></h1>
        <p class="text-center"><?php echo site_phrase('These_are_the_most_latest_courses_among_Listen_Courses_learners_worldwide')?></p>
        <div class="courses-card">
            <div class="course-group-slider ">
                <?php
                $latest_courses = $this->crud_model->get_latest_10_course();
                foreach ($latest_courses as $latest_course) :
                    $lessons = $this->crud_model->get_lessons('course', $latest_course['id']);
                    $instructor_details = $this->user_model->get_all_user($latest_course['creator'])->row_array();
                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($latest_course['id']);
                    $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                    $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                    if ($number_of_ratings > 0) {
                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                    } else {
                        $average_ceil_rating = 0;
                    }
                    ?>
                    <div class="single-popup-course">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" id="latest_course_<?php echo $latest_course['id']; ?>" class="checkPropagation courses-card-body">
                            <div class="courses-card-image">
                                <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>">
                                <div class="courses-icon <?php if(in_array($latest_course['id'], $my_wishlist_items)) echo 'red-heart'; ?>" id="coursesWishlistIconLatestCourse<?php echo $latest_course['id']; ?>">
                                    <i class="fa-solid fa-heart checkPropagation" onclick="actionTo('<?php echo site_url('home/toggleWishlistItems/'.$latest_course['id'].'/LatestCourse'); ?>')"></i>
                                </div>
                                <div class="courses-card-image-text">
                                    <h3><?php echo get_phrase($latest_course['level']); ?></h3>
                                </div> 
                            </div>
                            <div class="courses-text">
                                <h5 class="mb-2"><?php echo $latest_course['title']; ?></h5>
                                <div class="review-icon">
                                    <div class="review-icon-star align-items-center">
                                        <p><?php echo $average_ceil_rating; ?></p>
                                        <p><i class="fa-solid fa-star <?php if($number_of_ratings > 0) echo 'filled'; ?>"></i></p>
                                        <p>(<?php echo $number_of_ratings; ?> <?php echo get_phrase('Reviews') ?>)</p>
                                    </div>
                                    <div class="review-btn d-flex align-items-center">
                                       <span class="compare-img checkPropagation" onclick="redirectTo('<?php echo base_url('home/compare?course-1='.slugify($latest_course['title']).'&course-id-1='.$latest_course['id']); ?>');">
                                            <img src="<?php echo base_url('assets/frontend/default-new/image/compare.png') ?>">
                                            <?php echo get_phrase('Compare'); ?>
                                        </span>
                                    </div>
                                </div>
                                <p class="ellipsis-line-2"><?php echo $latest_course['short_description'] ?></p>
                                <div class="courses-price-border">
                                    <div class="courses-price">
                                        <div class="courses-price-left">
                                            <?php if($latest_course['is_free_course']): ?>
                                                <h5><?php echo get_phrase('Free'); ?></h5>
                                            <?php elseif($latest_course['discount_flag']): ?>
                                                <h5><?php echo currency($latest_course['discounted_price']); ?></h5>
                                                <p class="mt-1"><del><?php echo currency($latest_course['price']); ?></del></p>
                                            <?php else: ?>
                                                <h5><?php echo currency($latest_course['price']); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="courses-price-right ">
                                            <p class="m-0"><i class="fa-regular fa-clock p-0 text-15px"></i> <?php echo $course_duration; ?></p>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </a>




                        <div id="latest_course_feature_<?php echo $latest_course['id']; ?>" class="course-popover-content">
                            <?php if ($latest_course['last_modified'] == "") : ?>
                                <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['date_added']); ?></p>
                            <?php else : ?>
                                <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['last_modified']); ?></p>
                            <?php endif; ?>
                            <div class="course-title">
                                 <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"><?php echo $latest_course['title']; ?></a>
                            </div>
                            <div class="course-meta">
                                <?php if ($latest_course['course_type'] == 'general') : ?>
                                    <span class=""><i class="fas fa-play-circle"></i>
                                        <?php echo $this->crud_model->get_lessons('course', $latest_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                    </span>
                                    <span class=""><i class="far fa-clock"></i>
                                        <?php echo $course_duration; ?>
                                    </span>
                                <?php elseif ($latest_course['course_type'] == 'h5p') : ?>
                                    <span class="badge bg-light"><?= site_phrase('h5p_course'); ?></span>
                                <?php elseif ($latest_course['course_type'] == 'scorm') : ?>
                                    <span class="badge bg-light"><?= site_phrase('scorm_course'); ?></span>
                                <?php endif; ?>
                                <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($latest_course['language']); ?></span>
                             </div>
                            <div class="course-subtitle">
                                 <?php echo $latest_course['short_description']; ?>
                            </div>
                            <h6 class="text-black text-14px mb-1"><?php echo get_phrase('Outcomes') ?>:</h6>
                            <ul class="will-learn">
                                <?php $outcomes = json_decode($latest_course['outcomes']);
                                foreach ($outcomes as $outcome) : ?>
                                    <li><?php echo $outcome; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="popover-btns">
                                <?php $cart_items = $this->session->userdata('cart_items'); ?>
                                <?php if(is_purchased($latest_course['id'])): ?>
                                    <a href="<?php echo site_url('home/lesson/'.slugify($latest_course['title']).'/'.$latest_course['id']) ?>" class="purchase-btn d-flex align-items-center  me-auto"><i class="far fa-play-circle me-2"></i> <?php echo get_phrase('Start Now'); ?></a>
                                    <?php if ($latest_course['is_free_course'] != 1) : ?>
                                        <button type="button" class="gift-btn ms-auto" title="<?php echo get_phrase('Gift someone else'); ?>" data-bs-toggle="tooltip" onclick="actionTo('<?php echo site_url('home/handle_buy_now/' . $latest_course['id'].'?gift=1'); ?>')"><i class="fas fa-gift"></i></button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if ($latest_course['is_free_course'] == 1) : ?>
                                        <a class="purchase-btn green_purchase ms-auto" href="<?php echo site_url('home/get_enrolled_to_free_course/' . $latest_course['id']); ?>"><?php echo get_phrase('Enroll Now'); ?></a>
                                    <?php else : ?>

                                        <!-- Cart button -->
                                        <a id="added_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto <?php if(!in_array($latest_course['id'], $cart_items)) echo 'd-hidden'; ?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'].'/latest_course'); ?>');">
                                            <i class="fas fa-minus me-2"></i> <?php echo get_phrase('Remove from cart'); ?>
                                        </a>
                                        <a id="add_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto <?php if(in_array($latest_course['id'], $cart_items)) echo 'd-hidden'; ?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'].'/latest_course'); ?>'); ">
                                            <i class="fas fa-plus me-2"></i> <?php echo get_phrase('Add to cart'); ?>
                                        </a>
                                        <!-- Cart button ended-->
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#latest_course_<?php echo $latest_course['id']; ?>').webuiPopover({
                                        url:'#latest_course_feature_<?php echo $latest_course['id']; ?>',
                                        trigger:'hover',
                                        animation:'pop',
                                        cache:false,
                                        multi:true,
                                        direction:'rtl', 
                                        placement:'horizontal',
                                    });
                                });
                            </script>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!---------- Latest courses Section End --------------->




<!-- New Full-Width Section with Trustmary Widget Start -->
<section style="background-color: #f8f7ff; padding: 60px 0; width: 100%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Include Trustmary Widget Script -->
                <script src="https://widget.trustmary.com/6pwV9EcaL"></script>
            </div>
        </div>
    </div>
</section>
<!-- New Full-Width Section with Trustmary Widget End -->




<?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true); ?>
<?php if(count($motivational_speechs) > 0): ?>

<?php endif; ?>

<!--<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>-->
<!--<?php if(count($website_faqs) > 0): ?>-->
<!---------- Questions Section Start  -------------->
<!--<section class="faq">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-2"></div>-->
<!--            <div class="col-lg-8">-->
<!--                <h1 class="text-center mt-4"><?php echo get_phrase('Frequently Asked Questions') ?></h1>-->
<!--                <p class="text-center mt-4 mb-5"><?php echo get_phrase('Have something to know?') ?> <?php echo get_phrase('Check here if you have any questions about us.') ?></p>-->
<!--            </div>-->
<!--            <div class="col-lg-2"></div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-md-12">-->
<!--                <div class="faq-accrodion mb-0">-->
<!--                    <div class="accordion" id="accordionFaq">-->
<!--                        <?php foreach($website_faqs as $key => $faq): ?>-->
<!--                            <?php if($key > 4) break; ?>-->
<!--                            <div class="accordion-item">-->
<!--                              <h2 class="accordion-header" id="<?php echo 'faqItemHeading'.$key; ?>">-->
<!--                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel'.$key; ?>" aria-expanded="true" aria-controls="<?php echo 'faqItempanel'.$key; ?>">-->
<!--                                    <?php echo $faq['question']; ?>-->
<!--                                </button>-->
<!--                              </h2>-->
<!--                              <div id="<?php echo 'faqItempanel'.$key; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'faqItemHeading'.$key; ?>"  data-bs-parent="#accordionFaq">-->
<!--                                <div class="accordion-body">-->
<!--                                    <p><?php echo nl2br($faq['answer']); ?></p>-->
<!--                                </div>-->
<!--                              </div>-->
<!--                            </div>-->
<!--                        <?php endforeach; ?>-->
<!--                    </div>-->
<!--                    <?php if(count($website_faqs) > 5): ?>-->
<!--                        <a href="<?php echo site_url('home/faq') ?>" class="btn btn-primary mt-5"><?php echo get_phrase('See More'); ?></a>-->
<!--                    <?php endif; ?>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!---------- Questions Section End  -------------->
<!--<?php endif; ?>-->


<!------------- Blog Section Start ------------>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if(get_frontend_settings('blog_visibility_on_the_home_page') && $latest_blogs->num_rows() > 0): ?>
<section class="courses blog">
    <div class="container">
        <h1 class="text-center"><span><?php echo site_phrase('Visit our latest blogs')?></span></h1>
        <p class="text-center"><?php echo site_phrase('Visit our valuable articles to get more information.')?>
        <div class="courses-card">
            <div class="row">
               <?php foreach($latest_blogs->result_array() as $latest_blog):
                $user_details = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>  
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="<?php echo site_url('blog/details/'.slugify($latest_blog['title']).'/'.$latest_blog['blog_id']); ?>" class="courses-card-body">
                        <div class="courses-card-image">
                            <?php $blog_thumbnail = 'uploads/blog/thumbnail/'.$latest_blog['thumbnail'];
                               if(!file_exists($blog_thumbnail) || !is_file($blog_thumbnail)):
                                   $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                              endif; ?>
                            <div class="courses-card-image">
                             <img src="<?php echo $blog_thumbnail; ?>">
                            </div>
                            <div class="courses-card-image-text">
                                <h3><?php echo $blog_category['title']; ?></h3>
                            </div> 
                        </div>
                        <div class="courses-text">
                            <h5><?php echo $latest_blog['title']; ?></h5>
                            <p class="ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 100); ?></p>
                            <div class="courses-price-border">
                                <div class="courses-price">
                                    <div class="courses-price-left">
                                        <img class="rounded-circle" src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>">
                                        <h5><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h5>
                                    </div>
                                    <div class="courses-price-right ">
                                        <p><?php echo get_past_time($latest_blog['added_date']); ?></p>
                                    </div>
                                </div>
                            </div>
                           </div>
                     </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<!------------- Become Students Section start --------->
<!--<section class="student">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-6  <?php if (get_settings('allow_instructor') != 1) echo 'w-100'; ?>">-->
<!--                <div class="student-body-1">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">-->
<!--                            <div class="student-body-text">-->
<!--                                <img src="<?php echo base_url('assets/frontend/default-new/image/2.png')?>">-->
<!--                                <h1><?php echo site_phrase('join_now_to_start_learning'); ?></h1>-->
<!--                                <p><?php echo site_phrase('Learn from our quality instructors!')?> </p>-->
<!--                                <a href="<?php echo site_url('sign_up'); ?>"><?php echo site_phrase('get_started'); ?></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">-->
<!--                            <img class="man" src="<?php echo base_url('assets/frontend/default-new/image/student-1.png')?>">-->
<!--                        </div>-->
<!--                     </div>-->
<!--                </div>      -->
<!--            </div>-->
<!--            <?php if (get_settings('allow_instructor') == 1) : ?>-->
<!--                <div class="col-lg-6 ">-->
<!--                    <div class="student-body-2">-->
<!--                    <div class="row">-->
<!--                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 ">-->
<!--                                <div class="student-body-text">-->
<!--                                  <img src="<?php echo base_url('assets/frontend/default-new/image/2.png')?>">-->
<!--                                    <h1><?php echo site_phrase('become_a_new_instructor'); ?></h1>-->
<!--                                    <p><?php echo site_phrase('Teach_thousands_of_students_and_earn_money!')?> </p>-->
<!--                                    <?php if($this->session->userdata('user_id')): ?>-->
<!--                                       <a  href="<?php echo site_url('user/become_an_instructor'); ?>"><?php echo site_phrase('join_now'); ?></a>-->
<!--                                      <?php else: ?>-->
<!--                                        <a  href="<?php echo site_url('sign_up?instructor=yes'); ?>"><?php echo site_phrase('join_now'); ?></a>-->
<!--                                    <?php endif; ?>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-4">-->
<!--                            <img class="man" src="<?php echo base_url('assets/frontend/default-new/image/student-2.png')?>">-->
<!--                            </div>-->
<!--                        </div>  -->
<!--                    </div> -->
<!--                </div>-->
<!--            <?php endif; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!------------- Become Students Section End --------->