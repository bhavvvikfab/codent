<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Contact
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<style>
  /* Add your custom CSS styles here */
  .contact-section {
    background-color: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    height: 90%;
  }

  .contact-form input,
  .contact-form textarea,
  .contact-form button {
    margin-bottom: 15px;
  }

  .contact-form input,
  .contact-form textarea {
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    width: 100%;
    transition: border-color 0.3s ease;
  }

  .contact-form input:focus,
  .contact-form textarea:focus {
    border-color: #007bff;
    outline: none;
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
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .info-item {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-bottom: 20px;
  }

  .info-item h3 {
    margin-top: 10px;
    margin-bottom: 5px;
    font-size: 18px;
  }

  .info-item p {
    margin-bottom: 0;
    font-size: 14px;
    color: #555;
  }

  .info-item i {
    font-size: 30px;
    color: #4154f1;
    margin-bottom: 10px;
  }

  .section-title {
    text-align: center;
    margin-bottom: 40px;
  }

  .section-title h2 {
    font-size: 36px;
    margin-bottom: 20px;
    font-weight: bold;
    position: relative;
    display: inline-block;
  }

  .section-title h2::before {
    content: '';
    position: absolute;
    width: 50px;
    height: 4px;
    background-color: #007bff;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
  }

  .section-title p {
    font-size: 18px;
    color: #555;
    max-width: 600px;
    margin: 0 auto;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  .toast {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #333;
    color: #fff;
    padding: 15px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1000;
    text-align: center;
  }

  .toast.show {
    opacity: 1;
  }

  .loader {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    animation: spin 2s linear infinite;
    display: none;
    margin: auto;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>

<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
    <br>
    <p>We'd love to hear from you! Whether you have a question or need assistance, feel free to contact us.</p>
  </div>

  <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6 d-flex align-items-stretch">
        <div class="contact-img aos-init aos-animate contact-section" data-aos="fade-right">
          <!-- Change the src attribute to your image path -->
        
        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item aos-init aos-animate" data-aos="fade" data-aos-delay="200">
              <i class="fa fa-map-marker-alt"></i>
              <h3>Address</h3>
              <p>A108 Adam Street</p>
              <p>New York, NY 535022</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item aos-init aos-animate" data-aos="fade" data-aos-delay="300">
              <i class="fa fa-phone-alt"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
              <p>+1 6678 254445 41</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item aos-init aos-animate" data-aos="fade" data-aos-delay="400">
              <i class="fa fa-envelope"></i>
              <h3>Email Us</h3>
              <p>info@example.com</p>
              <p>contact@example.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item aos-init aos-animate" data-aos="fade" data-aos-delay="500">
              <i class="fa fa-clock"></i>
              <h3>Open Hours</h3>
              <p>Monday - Friday</p>
              <p>9:00AM - 05:00PM</p>
            </div>
          </div><!-- End Info Item -->
        </div>
      </div>
      </div>

      <div class="col-lg-6 d-flex align-items-stretch">
        <div class="contact-form contact-section">
          <form id="contactForm" action="<?= base_url('contact') ?>" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
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
                <button type="submit" class="btn btn-primary py-2 px-5 w-50">Send Message</button>
              </div>
            </div>
            <div class="loader" id="loader"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function showSwal(message, icon) {
    Swal.fire({
      icon: icon,
      title: icon.charAt(0).toUpperCase() + icon.slice(1),
      text: message,
    });
  }

  <?php if (session()->has('status') && session('status') == 'success'): ?>
    showSwal('Your message has been sent successfully!', 'success');
  <?php endif; ?>
  <?php if (session()->has('status') && session('status') == 'error'): ?>
    showSwal('Something is Wrong....Please Try Again Later', 'error');
  <?php endif; ?>

  document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var form = this;
    var loader = document.getElementById('loader');
    loader.style.display = 'block';
    form.querySelector('button[type="submit"]').disabled = true;

    // Simulate a delay for the loader effect (for demo purposes)
    setTimeout(function() {
      form.submit();
    }, 2000);
  });
</script>

<?= $this->endSection() ?>
