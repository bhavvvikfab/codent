<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Contact
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<style>
  /* Add your custom CSS styles here */
  /* Example styles for the contact form */
  .contact-form {
    background-color: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
  }

  .contact-form input,
  .contact-form textarea,
  .contact-form button {
    margin-bottom: 10px;
  }

  .contact-form button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .contact-form button:hover {
    background-color: #0056b3;
  }

  .contact-img {
    margin-bottom: 30px;
  }

  .contact-img img {
    max-width: 100%;
    border-radius: 10px;
  }
</style>
<section class="my-dent-section ftco-section d-portal-bg d-flex flex-column justify-content-center">
    <div class="container">
        <div class="myoverlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ftco-animate">
                    <h1 class="h1hedaing text-center">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="contact section">
  <div class="container section-title aos-init aos-animate" data-aos="fade-up">
   <br><br>
  </div>

  <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="contact-img aos-init aos-animate" data-aos="fade-right">
          <!-- Change the src attribute to your image path -->
          <img src="<?=base_url()?>public/images/contact.jpg" alt="Contact Image" style="height: max-content;">
        </div>
        <!-- Info Items -->
      </div>

      <div class="col-lg-6">
        <form id="contact" action="<?= base_url('contact') ?>" method="post" class="php-email-form contact-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <!-- <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div> -->

              <button type="submit" class="btn btn-primary py-2 px-5 w-50">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php if (session()->has('status') && session('status') == 'success'): ?>
  <script>
    showToast('Your message has been sent successfully!');  
  </script>
  <!-- <div class="alert alert-success"></div> -->
<?php endif; ?>
<?php if (session()->has('status') && session('status') == 'error'): ?>
  <script>
    showToast('Something is Wrong....Please Try Agian Later');  
  </script>
  <!-- <div class="alert alert-danger"></div> -->
<?php endif; ?>

<?= $this->endSection() ?>
