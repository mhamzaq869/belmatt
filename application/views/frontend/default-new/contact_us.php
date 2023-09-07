<?php include "breadcrumb.php"; ?>

<!------------ Contact section start ----->
<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="contact-heading">
                    <h3><?php echo get_phrase('Contact Us') ?></h3>
                    <p>Connect with us to experience seamless communication. We value open dialogue and are eager to engage with you. Whether you have questions, ideas, or feedback, we are here to listen and respond.</p>
                </div>               
            </div>
            <div class="col-lg-6 col-md-4">
                <!-- no content -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact-image">
                    <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/contact-img.png">
                </div>
                <div class="office-time">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="office-hour">
                                <div class="icon">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div class="office-hour-text">
                                    <h4>Office Hours</h4>
                                    <p>Monday-Friday</p>
                                    <p>8:00 am to 5:00 pm</p>
                                </div>
                            </div>
                            <div class="office-hour">
                                <div class="icon">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                <div class="office-hour-text">
                                    <h4>Office</h4>
                                    <p>629 12th St, Modesto,</p>
                                    <p>CA 95354, United States</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="office-hour">
                                <div class="icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="office-hour-text">
                                    <h4>Our Address</h4>
                                    <p>M629 12th St, Modesto,</p>
                                    <p>CA 95354, United States</p>
                                </div>
                            </div>
                            <div class="office-hour">
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="office-hour-text">
                                    <h4>Get In Touch</h4>
                                    <p>+(111)65-458-856</p>
                                    <p>+(111)65-458-856</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-section">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
                            </div>  
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="mb-3">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                            </div> 
                            <div class="input-group comment">
                                <textarea class="form-control" aria-label="With textarea" id="profile-bio-text" placeholder="Comment"></textarea>
                              </div>
                              <div class="cheack-box">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault"> 
                                        <p>I agree that my submitted data is being collected and stored.</p>
                                    </label>
                                  </div>                                  
                              </div>
                              <div class="form-btn">
                                <a href="#">Submit</a>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------------ Contact secton end -------->