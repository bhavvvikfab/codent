<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
View_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Doctor Profile</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Doctor Profile</li>
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
                      <h5 class="card-title text-start">View Doctor Profile</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('doctors') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">

              <div class="table-responsive">
              <form class="m-3">
    <?php if ($doctor): ?>
        <div class="row">
            <div class="col-lg-4 pb-2 pb-lg-0">
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <i class="bi bi-image-fill" aria-hidden="true"></i>
                    <h5 class="mb-0 mx-2"><b>Doctor Image:</b></h5>
                </div>

                <?php if (!empty($user['profile'])): ?>
                    <div style="display: flex; justify-content: center;">
                        <div style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden;">
                            <img src="<?= base_url('public/images/' . $user['profile']) ?>" alt="Doctor Image" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                <?php else: ?>
                    <span>No Image</span>
                <?php endif; ?>
            </div>

            <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-circle" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Doctor Name :</b> <?php echo $user['fullname']; ?></label>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i> 
                        <label class="form-label" for=""><b>Email:</b> <?php echo $user['email']; ?></label>
                    </div>                  
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Address :</b> <?php echo $user['address']; ?></label>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-calendar3-fill" aria-hidden="true"> 
                        <label class="form-label" for=""><b>DOB :</b> <?php echo $user['date_of_birth']; ?></i></label>
                    </div>                  
                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Phone Number:</b> <?php echo isset($user['phone']) ? $user['phone'] : 'Unknown'; ?></label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-calendar-week-fill" aria-hidden="true"></i>
                        <label class="form-label" for="inputName4"><b>Schedule:</b> <?php echo $doctor['schedule']; ?></label>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-file-medical-fill" aria-hidden="true"></i> 
                        <label class="form-label" for=""><b>Specialty In:</b> <?php echo $doctor['specialist_of']; ?></label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-award-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Qualification :</b> <?php echo $doctor['qualification']; ?></label>

                    </div>
                </div>
                
                <hr>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <i class="bi bi-list-ul" aria-hidden="true"></i> 
                        <label class="form-label" for=""><b>About:</b> <?php echo $doctor['about']; ?></label>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>No doctor found with the provided ID.</p>
    <?php endif; ?>
</form>
         
          </div>
        </div>
      </div>

              </div>
            </div>
        </div>
      </div>
    </section>
         <!-- End Card with an image on left -->

  </main><!-- End #main -->
  <?= $this->endSection() ?>