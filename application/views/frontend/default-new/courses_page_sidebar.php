<form action="<?php echo site_url('home/courses'); ?>" method="get" id="course_filter_form">

    <?php if(isset($_GET['query']) && !empty($_GET['query'])): ?>
        <input type="hidden" name="query" value="<?php echo $_GET['query']; ?>">
    <?php endif; ?>

    <div class="course-all-category">
        
    
    <!-- Type Filter -->
    <div class="course-price course-category mb-3">
        <h3><?php echo get_phrase('Type'); ?></h3>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" value="all" id="type_all" onchange="filterCourse()" <?php if($selected_type== 'all') echo 'checked'; ?>>
            <label class="form-check-label" for="type_all">
                <p class="text-radio"><?php echo get_phrase('All'); ?></p>
            </label>
        </div>
        <?php
        $selected_type = isset($_GET['type']) ? $_GET['type'] : array();
        $types = array('E-Learning', 'Live Webinar', 'Classroom');
        $types_val = array('e-learning', 'live-webinar', 'classroom'); 

        foreach ($types as $key => $type): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="<?php echo $types_val[$key]; ?>" name="type" id="type_<?php echo strtolower($types_val[$key]); ?>" onchange="filterCourse()" <?php if($selected_type == $types_val[$key]) echo 'checked'; ?>>
                <label class="form-check-label" for="type_<?php echo strtolower($types_val[$key]); ?>">
                    <p class="text-radio"><?php echo $type; ?></p>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="course-category mb-3">
        <h3><?php echo get_phrase('Categories'); ?></h3>
        
        <div class="form-check">
            <input class="form-check-input" type="radio" value="all" name="category"  id="category_all" onchange="filterCourse()" <?php if($selected_category == 'all') echo 'checked'; ?>>
            <label class="form-check-label" for="category_all">
                <div class="category-heading">
                    <p class="radio-text"><?php echo get_phrase('All category') ?></p>
                </div>
                <span>(<?php echo $this->crud_model->get_active_course()->num_rows(); ?>)</span>
            </label>
        </div>
        <div class="webdesign less">
            <?php $categories = $this->crud_model->get_categories()->result_array(); ?>
            <?php foreach($categories as $category): ?>
                <?php $course_number = $this->crud_model->get_active_course_by_category_id($category['id'], 'category_id')->num_rows(); ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="<?php echo $category['slug'] ?>" name="category" id="category-<?php echo $category['id']; ?>" onchange="filterCourse()" <?php if($selected_category == $category['slug']) echo 'checked'; ?>>
                    <label class="form-check-label" for="category-<?php echo $category['id']; ?>">
                        <div class="category-heading">
                            <p class="radio-text"><?php echo $category['name']; ?></p>
                        </div>
                        <span>(<?php echo $course_number; ?>)</span>
                    </label>
                </div>
                <ul>
                    <?php foreach ($this->crud_model->get_sub_categories($category['id']) as $sub_category): ?>
                        <?php $course_number = $this->crud_model->get_active_course_by_category_id($sub_category['id'], 'sub_category_id')->num_rows(); ?>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="<?php echo $sub_category['slug'] ?>" name="category" id="sub_category-<?php echo $sub_category['id']; ?>" onchange="filterCourse()" <?php if($selected_category == $sub_category['slug']) echo 'checked'; ?>>
                                <label class="form-check-label" for="sub_category-<?php echo $sub_category['id']; ?>">
                                    <p class="radio-text"><?php echo $sub_category['name']; ?></p>
                                    <span>(<?php echo $course_number; ?>)</span>
                                </label>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
        <div class="show-more">
            <a class="show-more-less-btn" href="#" onclick="$('.course-all-category .course-category .webdesign').toggleClass('less'); $('.show-more-less-btn').toggleClass('d-none');"><?php echo get_phrase('Show More'); ?></a>
            <a class="show-more-less-btn d-none" href="#" onclick="$('.course-all-category .course-category .webdesign').toggleClass('less'); $('.show-more-less-btn').toggleClass('d-none');"><?php echo get_phrase('Show Less'); ?></a>
        </div>
    </div>
        
    <!-- Profession Filter -->
    <div class="course-price course-category"> 
        <h3><?php echo get_phrase('Profession'); ?></h3>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="profession" value="all" id="profession_all" onchange="filterCourse()" <?php if($selected_type== 'all') echo 'checked'; ?>>
            <label class="form-check-label" for="profession_all">
                <p class="text-radio"><?php echo get_phrase('All'); ?></p>
            </label>
        </div>
        <?php
        $selected_professions = isset($_GET['profession']) ? $_GET['profession'] : array();
        $professions = array(
            'nurses', 'doctors', 'paramedics', 'pharmacists', 'allied-healthcare-professionals',
            'healthcare-assistants', 'managers', 'admin-staff', 'physician-assistants', 'overseas-doctors'
        );
        $professions_text = array(
            'Nurses', 'Doctors', 'Paramedics', 'Pharmacists', 'Allied Healthcare Professionals',
            'Healthcare Assistants', 'Managers', 'Admin Staff', 'Physician Assistants', 'Overseas Doctors'
        );
        foreach ($professions as $i => $profession): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="<?php echo $profession; ?>" name="profession" id="profession_<?php echo strtolower($profession); ?>" onchange="filterCourse()" <?php if($profession == $selected_professions) echo 'checked'; ?>>
                <label class="form-check-label" for="profession_<?php echo strtolower($profession); ?>">
                    <p class="text-radio"><?php echo $professions_text[$i]; ?></p>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

        <div class="course-price course-category">
            <h3><?php echo get_phrase('Price'); ?></h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="price" value="all" id="price_all" onchange="filterCourse()" <?php if($selected_price== 'all') echo 'checked'; ?>>
                <label class="form-check-label" for="price_all">
                    <p class="text-radio"><?php echo get_phrase('All'); ?></p>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="price" value="free"  id="price_free" onchange="filterCourse()" <?php if($selected_price == 'free') echo 'checked'; ?>>
                <label class="form-check-label" for="price_free">
                    <p class="text-radio"><?php echo get_phrase('Free'); ?></p>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="price" value="paid" id="price_paid" onchange="filterCourse()" <?php if($selected_price == 'paid') echo 'checked'; ?>>
                <label class="form-check-label" for="price_paid">
                    <p class="text-radio"><?php echo get_phrase('Paid'); ?></p>
                </label>
            </div>
        </div>
        <div class="course-price course-category">
            <h3><?php echo get_phrase('Level'); ?></h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="level" value="all" id="level_all" onchange="filterCourse()" <?php if($selected_level == 'all') echo 'checked'; ?>>
                <label class="form-check-label" for="level_all">
                    <p class="text-radio"><?php echo get_phrase('All'); ?></p>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="beginner" name="level" id="level_beginner" onchange="filterCourse()" <?php if($selected_level == 'beginner') echo 'checked'; ?>>
                <label class="form-check-label" for="level_beginner">
                    <p class="text-radio"><?php echo get_phrase('Beginner'); ?></p>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="intermediate" name="level" id="level_intermediate" onchange="filterCourse()" <?php if($selected_level == 'intermediate') echo 'checked'; ?>>
                <label class="form-check-label" for="level_intermediate">
                    <p class="text-radio"><?php echo get_phrase('Intermediate'); ?></p>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="advanced" name="level" id="level_advanced" onchange="filterCourse()" <?php if($selected_level == 'advanced') echo 'checked'; ?>>
                <label class="form-check-label" for="level_advanced">
                    <p class="text-radio"><?php echo get_phrase('Advanced'); ?></p>
                </label>
            </div>
        </div>
        <div class="course-price course-category">
            <h3><?php echo get_phrase('Language'); ?></h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="all" name="language" id="language_all" onchange="filterCourse()" <?php if($selected_language == 'all') echo 'checked'; ?>>
                <label class="form-check-label" for="language_all">
                    <p class="text-radio"><?php echo get_phrase('All'); ?></p>
                </label>
            </div>
            <?php
            $languages = $this->crud_model->get_all_languages();
            foreach ($languages as $language): ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="<?php echo strtolower($language); ?>" name="language" id="language_<?php echo $language; ?>" onchange="filterCourse()" <?php if($selected_language == strtolower($language)) echo 'checked'; ?>>
                    <label class="form-check-label" for="language_<?php echo $language; ?>">
                        <p class="text-radio"><?php echo ucfirst($language); ?></p>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="course-price course-category">
            <h3><?php echo get_phrase('Ratings'); ?></h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rating" value="all" id="rating_all" onchange="filterCourse()" <?php if($selected_rating == 'all') echo 'checked'; ?>>
                <label class="form-check-label" for="rating_all">
                    <p class="text-radio"><?php echo get_phrase('All'); ?></p>
                </label>
            </div>
            <div class="course-icon">
                <?php for($i=1; $i<=5; $i++): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="<?php echo $i; ?>" id="rating_<?php echo $i; ?>" onchange="filterCourse()" name="rating" <?php if($selected_rating == $i) echo 'checked'; ?>>
                        <label class="form-check-label" for="rating_<?php echo $i; ?>">
                            <div class="form-check-icon">
                                <ul>
                                    <?php for($sub_i = 1; $sub_i <= 5; $sub_i++): ?>
                                        <li class="<?php if($i>=$sub_i) echo 'icon-color'; ?>">
                                            <i class="fa-solid fa-star"></i>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </label>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <input id="sorting_hidden_input" type="hidden" name="sort_by" value="<?php echo $selected_sorting; ?>">
    
</form>