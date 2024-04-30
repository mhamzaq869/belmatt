<style>
  .style_2 {
      padding: 0;
      list-style: none;
      font-size: 0;
  }

   .style_2 li {
      display: inline-block;
      width: 50%;
      margin-bottom: 5px;
  }
  .style_2 li a:after {
    display: block;
    position: absolute;
    width: 4px;
    left: 0;
    margin-top: -2px;
    background-color: #fff;
}

.style_2 li a:after {
    height: 4px;
    z-index: 10;
    top: 50%;
    content: "";
    border-radius: 50%;
}

ul.style_2 li a {
    position: relative;
    padding-left: 15px;
    font-size: 14px;
    text-decoration: none !important;
    color: #fff;
    display: block;
}

ul.style_2 li a {  
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; 
    padding-right: 5px;
}
</style>
<!--------- footer Section Start--------------->
<section class="footer">
  <div class="container">
    <div class="row">
      
      <!-- <div class="col-lg-2 col-md-4 col-sm-4 col-4 mb-5">
        <h1>
          <?php echo site_phrase('top_categories'); ?>
        </h1>
        <ul>
          <?php $top_10_categories = $this->crud_model->get_top_categories(6, 'sub_category_id'); ?>
          <?php foreach($top_10_categories as $top_10_category): ?>
          <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
          <li><a
              href="<?php echo site_url('home/courses?category='.$category_details['slug']); ?>">
              <?php echo $category_details['name']; ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-4">
        <h1><?php echo site_phrase('help'); ?>
        </h1>
        <ul class="style_2">
          <li>
            <a href="<?php echo site_url('home/contact_us'); ?>"><?php echo ucwords(site_phrase('contact_us')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/about_us'); ?>"><?php echo ucwords(site_phrase('about_us')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo ucwords(site_phrase('privacy_policy')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo ucwords(site_phrase('terms_and_condition')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/faq'); ?>"><?php echo ucwords(site_phrase('FAQs')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/refund_policy'); ?>"><?php echo ucwords(site_phrase('refund_policy')); ?></a>
          </li>
        </ul>
      </div> -->

      <div class="col-lg-3 col-md-3 col-sm-6 col-3">
        <h1> <?php echo site_phrase('quick_links'); ?> </h1>
        <ul class="style_2">
          <li>
            <a href="<?php echo site_url('home/about_us'); ?>"><?php echo ucwords(site_phrase('about_us')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('blog'); ?>"><?php echo ucwords(site_phrase('blog')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/courses'); ?>"><?php echo ucwords(site_phrase('all_courses')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('sign_up'); ?>"><?php echo ucwords(site_phrase('sign_up')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/contact_us'); ?>"><?php echo ucwords(site_phrase('contact_us')); ?></a>
          </li> 
          <li>
            <a href="<?php echo site_url('home/faq'); ?>"><?php echo ucwords(site_phrase('FAQs')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/refund_policy'); ?>"><?php echo ucwords(site_phrase('refund_policy')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo ucwords(site_phrase('privacy_policy')); ?></a>
          </li>
          <li>
            <a href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo ucwords(site_phrase('terms_and_condition')); ?></a>
          </li>  
          <?php $custom_page_menus = $this->crud_model->get_custom_pages('', 'footer'); ?>
          <?php foreach($custom_page_menus->result_array() as $custom_page_menu): ?>
            <li><a href="<?php echo site_url('page/'.$custom_page_menu['page_url']); ?>"><?php echo ucwords($custom_page_menu['button_title']); ?></a> </li>
          <?php endforeach; ?>
        </ul>
      </div>
      
      <div class="col-lg-4 col-md-3 col-sm-6 col-12 mb-5">
        <h6 class="text-white">BELMATT HEALTHCARE TRAINING LIMITED</h6>
        <p> <?php echo get_settings('address'); ?>  </p>
        <p class="py-0 "> Tel: <?php echo get_settings('phone'); ?>  </p>
        <a class="py-0 text-secondary" href="mailto:<?php echo get_settings('system_email'); ?>"> <small><?php echo get_settings('system_email'); ?>  </small></a>
      </div>

      <div class="col-lg-5 col-md-12 col-sm-12 col-12 mb-5"> 
        <h1 class="text-white">Belmatt Course Brochure</h1>
        <p class="py-0">©2024 All Rights Reserved.</p>
        <a class="copyright_text_link py-0" href="<?php echo get_settings('footer_link'); ?>">
          Belmatt Healthcare Training Ltd
        </a>
      </div>
    </div>
    <!-- <div class="lattest-news">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
          <h1>
            <?php echo get_phrase('Subscribe to our Newsletter'); ?>
          </h1>
          <form class="ajaxForm resetable"
            action="<?php echo site_url('home/subscribe_to_our_newsletter'); ?>"
            method="post">
            <input type="email" class="form-control" id="subscribe_email"
              placeholder="<?php echo get_phrase('Enter your email address'); ?>"
              name="email">
            <button class="form-arrow" type="submit"><i class="fa-solid fa-arrow-right-long"></i></button>
          </form>
        </div>

        <div class="col-lg-8 col-md-6  col-sm-12 col-12">
          <div class="icon right-icon">
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <a
                  href="<?php echo get_settings('footer_link'); ?>">
                  <?php echo site_phrase(get_settings('footer_text')); ?>
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div> -->
  </div>
</section>
<!--------- footer Section End--------------->


<section class="footer_copyright p-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-8">
        <div class="clearfix">
          <div class="copyright_text">
            <a class="copyright_text_link" href="<?php echo get_settings('footer_link'); ?>">
              <?php echo site_phrase(get_settings('footer_text')); ?>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-4"> 
      </div>
    </div>
  </div>
</section>
<!-- PAYMENT MODAL -->
<!-- Modal -->
<?php
$paypal_info = json_decode(get_settings('paypal'), true);
          $stripe_info = json_decode(get_settings('stripe_keys'), true);
          if ($paypal_info[0]['active'] == 0) {
              $paypal_status = 'disabled';
          } else {
              $paypal_status = '';
          }
          if ($stripe_info[0]['active'] == 0) {
              $stripe_status = 'disabled';
          } else {
              $stripe_status = '';
          }
          ?>