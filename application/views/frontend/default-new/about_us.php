<?php include "breadcrumb.php"; ?>

<!------- body section Start ------>
<section class="privacy-policy">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <?php echo get_frontend_settings('about_us'); ?>
            </div>
        </div>
    </div>
    <style>
    body {
      background-color: #ffffff;
    }

    .nav-tabs {
      border: none;
      background: #f8f9fa;
      border-radius: 5px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .nav-tabs .nav-item {
      margin-bottom: 0;
    }

    .nav-tabs .nav-link {
      border: none;
      padding: 15px 20px;
      color: #495057;
      font-weight: bold;
      border-radius: 5px 5px 0 0;
      transition: background-color 0.3s ease-in-out;
    }

    .nav-tabs .nav-link.active {
      background-color: #194582;
      color: #ffffff;
    }

    .tab-content {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 0 0 5px 5px;
      padding: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h3 {
      color: #007bff;
    }

    p {
      color: #555555;
    }
  </style>
<div class="container mt-5">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" id="Mission-tab" data-toggle="tab" href="#Mission">Mission</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="Quality-tab" data-toggle="tab" href="#Quality">Quality</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="Diversity-tab" data-toggle="tab" href="#Diversity">Diversity</a>
    </li>
  </ul>
  <div class="tab-content">
    <div id="Mission" class="tab-pane fade show active">
      <p>To develop the skills and knowledge of healthcare professionals through the design and delivery of high quality educational courses and services, that reflect current medical science and contributing to the improvement of primary care services and postgraduate training.
</p>
    </div>
    <div id="Quality" class="tab-pane fade">
      <p>SedWe value our customers and we are committed to providing a superior service by ensuring our lecturers are of the highest calibre. They are specialists in their fields with experience in academic and clinical positions. We also strive to respond to  requests for services in a timely, appropriate, and customer-focused manner.
</p>
    </div>
    <div id="Diversity" class="tab-pane fade">
      <p>We recognise that healthcare is evolving and embracing expanding roles amongst clinicians and service users.  We embrace a diverse group of delegates to include doctors, nurses, paramedics, pharmacists, physiotherapists and all allied health professionals. We recognise the importance of inter  – professional working and our courses incorporate problem based learning and case studies to cultivate our differences and similarities as healthcare professionals contributing to an atmosphere of acceptance and respect of the role we each play in enhancing patient safety in the community.
</p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</section>

<br>
<br>
 <!------- body section end ------>