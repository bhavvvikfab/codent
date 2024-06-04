<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Contact Us
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Contact Details</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Enquiry</li>
          </ol>
        </nav>
      </div>
    </div>
    </div> 
    <!-- End Page Title -->

    <!-- Card with an image on left -->
     <section class="section" id="viewsup1021">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">
            
             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Enquiry</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('enquiries') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">
                        <!-- Contact Information Content -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6>Address:</h6>
                                <p>123 Street, City, Country</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Phone:</h6>
                                <p>+123 456 7890</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6>Email:</h6>
                                <p>contact@yourdomain.com</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Working Hours:</h6>
                                <p>Mon - Fri: 9 AM - 5 PM</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Additional Information:</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, pulvinar facilisis justo mollis, auctor consequat urna.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End Main -->

<?= $this->endSection() ?>
