<style>
    .my-course-1-full-body {
        margin-bottom: 10px !important;
        border-radius: 20px;
    }

    .purple {
        background-color: #662C91;
    }

    .skyblue {
        background-color: #E2E8F0;
    }

    .capsule {
        background-color: #5D184A;
        border-radius: 40px;
        color: white;
    }

    .card-title {
        background-image: linear-gradient(to right, #5D184A, #662C91, #194582);
    }

    .card-title h1 {
        font-size: 44px;
    }

    .card-title hr {
        margin: auto;
        color: white;
        border: 0;
        border-top: 2px solid;
        opacity: 1;
        width: 65%;
    }

    .nav-tabs {
        border: none;
    }

    .nav-tabs .nav-link {
        color: black;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        color: #2b6cb0;
        background-color: #E2E8F0;
        border: 2px solid #2b6cb0;
        border-color: transparent transparent #2b6cb0;
    }

    .nav-tabs .nav-link.active {
        color: #2b6cb0;
        background-color: #E2E8F0;
        border: 2px solid #2b6cb0;
        border-color: transparent transparent #2b6cb0;
    }

    .css-label{ 
        background: #214582;
        padding: 15px 29px 15px 25px;
        border-radius: 30px 0px 0px 30px;
        position: absolute;
        right: 0;
        color: white;
    }
</style>

<section class="wish-list-body ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="my-course-1-full-body skyblue">
                    <?php $landing_page_url = 'uploads/landing-page/banner/'.$landing_page['banner']; ?>
                    <?php
                        if(file_exists($landing_page_url) && is_file($landing_page_url)):
                            $landing_page_url = base_url($landing_page_url);
                        else:
                            $landing_page_url = base_url('uploads/landing-page/banner/placeholder.png');
                        endif;
                    ?>
                    <img class="w-100" src="<?php echo $landing_page_url; ?>" alt="banner">
                </div>

                <div class="my-course-1-full-body text-white card-title p-5 text-center mt-0">
                    <h1 class="text-white">
                        <?php echo get_phrase($landing_page['title']); ?>
                    </h1>
                    <hr> <br>
                    <p><?php echo get_phrase($landing_page['header']); ?>
                    </p>
                </div>

                <div class="my-course-1-full-body skyblue mt-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active px-1" id="course-overview-tab" data-toggle="tab"
                                href="#course-overview" role="tab" aria-controls="course-overview"
                                aria-selected="true">Course Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1" id="prerequisites-tab" data-toggle="tab" href="#prerequisites"
                                role="tab" aria-controls="prerequisites" aria-selected="false">Prerequisites</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1" id="learn-tab" data-toggle="tab" href="#learn" role="tab"
                                aria-controls="learn" aria-selected="false">What Will I Learn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1" id="assessment-tab" data-toggle="tab" href="#assessment" role="tab"
                                aria-controls="assessment" aria-selected="false">Assessments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1" id="eligibility-tab" data-toggle="tab" href="#eligibility"
                                role="tab" aria-controls="eligibility" aria-selected="false">Eligibility</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1" id="lecturers-tab" data-toggle="tab" href="#lecturers" role="tab"
                                aria-controls="lecturers" aria-selected="false">Lecturers</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="course-overview" role="tabpanel"
                            aria-labelledby="course-overview-tab">
                            <div class="form-group pt-3">
                                <?php echo get_phrase($landing_page['course_overview']); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="prerequisites" role="tabpanel"
                            aria-labelledby="prerequisites-tab">
                            <div class="form-group pt-3">
                                <?php echo get_phrase($landing_page['prerequisites']); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="learn" role="tabpanel" aria-labelledby="learn-tab">
                            <div class="form-group pt-3">
                                <?php echo get_phrase($landing_page['learn']); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="assessment" role="tabpanel" aria-labelledby="assessment-tab">
                            <div class="form-group pt-3">
                                <?php echo get_phrase($landing_page['assessment']); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="eligibility" role="tabpanel" aria-labelledby="eligibility-tab">
                            <div class="form-group pt-3">
                                <?php echo get_phrase($landing_page['eligibility']); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lecturers" role="tabpanel" aria-labelledby="lecturers-tab">
                            <div class="form-group pt-3">
                                <?php echo get_phrase($landing_page['lecturers']); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-0">
                    <div class="col-4">
                        <div class="my-course-1-full-body mt-3" style="background-image:url(https://belmatt.vercel.app/images/e-learning.jpg);background-repeat:no-repeat;background-position:center;background-size:cover;height:230px;position: relative;">
                            <div class="card-body css-label" >
                                <div class="css-1ydmxns"></div>
                                <div class="css-1dx0dqg">E-Learning</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="my-course-1-full-body mt-3" style="background-image:url(https://belmatt.vercel.app/images/webinars.jpg);background-repeat:no-repeat;background-position:center;background-size:cover;height:230px;position: relative;">
                            <div class="card-body css-label" >
                                <div class="css-1ydmxns"></div>
                                <div class="css-1dx0dqg">Live Webinars</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="my-course-1-full-body mt-3" style="background-image:url(https://belmatt.vercel.app/images/classroom.jpg);background-repeat:no-repeat;background-position:center;background-size:cover;height:230px;position: relative;">
                            <div class="card-body css-label" >
                                <div class="css-1ydmxns"></div>
                                <div class="css-1dx0dqg">Classroom</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-8 col-sm-12">
                <div class="my-course-1-full-body purple">
                    <div class="card capsule">
                        <div class="card-body">
                            Duration:
                            <?php echo $landing_page['duration']; ?>
                            Hours
                        </div>
                    </div>

                    <div class="card capsule mt-2">
                        <div class="card-body">
                            Course Code:
                            <?php echo $landing_page['course_code']; ?>
                        </div>
                    </div>

                    <div class="card capsule mt-2">
                        <div class="card-body">
                            Course Credits:
                            <?php echo $landing_page['course_credits']; ?>
                        </div>
                    </div>

                    <div class="card capsule mt-2">
                        <div class="card-body">
                            Level:
                            <?php echo $landing_page['level']; ?>
                        </div>
                    </div>

                </div>
            </div>
 
        </div>
    </div>
</section>
