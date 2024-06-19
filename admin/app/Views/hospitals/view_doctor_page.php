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
              <?php
// Define a default image path
$defaultImage = 'default.jpg';
?>
    <?php if ($doctor): ?>
        <div class="row">
            <div class="col-lg-4 pb-2 pb-lg-0">
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <i class="bi bi-image-fill" aria-hidden="true"></i>
                    <h5 class="mb-0 mx-2"><b>Doctor Image:</b></h5>
                </div>

                <div style="display: flex; justify-content: center;">
    <div style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden;">
        <img 
        class="rounded-circle img-thumbnail"
        style="max-width: 150px;" 
            src="<?= base_url() ?>public/images/<?= !empty($user['profile']) ? $user['profile'] : $defaultImage ?>" 
            onerror="this.onerror=null; this.src='<?= base_url() ?>public/images/<?= $defaultImage ?>';" 
            alt="Profile Image">
    </div>
</div>
            </div>

            <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-circle" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Doctor Name :</b>  <?= isset($user['fullname']) ? esc($user['fullname']) : 'N/A' ?>


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i> 
                        <label class="form-label" for=""><b>Email :</b>  <?= isset($user['email']) ? esc($user['email']) : 'N/A' ?></label>
                    </div>                  
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Address :</b>  <?= isset($user['address']) ? esc($user['address']) : 'N/A' ?></label>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-calendar3-fill" aria-hidden="true"> 
                        <label class="form-label" for=""><b>DOB :</b> <?= isset($user['date_of_birth']) ? esc($user['date_of_birth']) : 'N/A' ?></i></label>
                    </div>                  
                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Phone Number :</b>  <?= isset($user['phone']) ? esc($user['phone']) : 'N/A' ?></label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-calendar-week-fill" aria-hidden="true"></i>
                        <label class="form-label" for="inputName4"><b>Schedule :</b>  <?= isset($user['schedule']) ? esc($user['schedule']) : 'N/A' ?></label>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-file-medical-fill" aria-hidden="true"></i> 
                        <label class="form-label" for=""><b>Specialty In :</b>  <?= isset($doctor['specialist_of']) ? esc($doctor['specialist_of']) : 'N/A' ?></label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-award-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""><b>Qualification :</b> <?= isset($doctor['qualification']) ? esc($doctor['qualification']) : 'N/A' ?></label>

                    </div>
                </div>
                
                <hr>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <i class="bi bi-list-ul" aria-hidden="true"></i> 
                        <label class="form-label" for=""><b>About :</b> <?= isset($doctor['about']) ? esc($doctor['about']) : 'N/A' ?></label>
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