<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Patients
<?= $this->endSection() ?>
<?= $this->section('content') ?>


  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Patient</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Patient</li>
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
                      <h5 class="card-title text-start">View Patient</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('patient') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">

              <div class="table-responsive">
            <form class="m-3">
            <?php if (!empty($patients) && is_array($patients)) : ?>
                  <?php foreach ($patients as $patient) : ?>
              <div class="row">


                <div class="col-lg-4 pb-2 pb-lg-0">
                  
                <div class="text-center mb-3">
                  <i class="bi bi-person-circle" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <h5><b> Patient Image: </b></h5>
                  </label><br> 
                  <img src="<?= base_url('public/images/' . $patient['profile']) ?>" alt="Profile Image" class="rounded-circle img-thumbnail" style="max-width: 100px;">
                  
                  </div>
                </div>

                <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                      <i class="bi bi-person-circle" aria-hidden="true"></i>
                      <label class="form-label" for="inputNanme05"> <b> Patient Name :</b> <?= $patient['fullname'] ?> </label>  
                     </div>
                       
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-envelope-fill" aria-hidden="true"></i>
                      <label class="form-label" for="inputdate"> <b> Email :</b>  <?= $patient['email'] ?>
                    </label> 
                     </div>
                  </div>
              <hr>
              <div class="row">
                  
    
                 <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Phone Number : </b> <?= $patient['phone'] ?>
                        </label>
                     </div>

                     <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-calendar-week-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>Date of Birth : </b><?= $patient['date_of_birth'] ?></label>  
                   </div>   

                      
                 
              </div>
              <hr>
              <div class="row">


              <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-house-door-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>Address : </b><?= $patient['address'] ?></label>  
                   </div>             
                

                 
                                                    
                   

              </div>

              
             
              
              </div>
              <?php endforeach; ?>
                  <?php else : ?>
                  <p>No patients found.</p>
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
