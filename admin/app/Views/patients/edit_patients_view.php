<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Patients
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Edit Patient</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Patient</li>
          </ol>
        </nav>
      </div>
    </div>
    </div>

<section class="section" id="adduserform123">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Edit Patient</h5>
                  </div>
                   <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('patient') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>
            <div class="card-body">
         

              <!-- General Form Elements -->
              <form>
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient Name</label>
                      <input type="text" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputtext" class="form-label"> <i class="bi bi-virus" style="font-size: 18px;"></i> Diseases</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputEmail" class="form-label"><i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email</label>
                      <input type="email" class="form-control">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                    <input type="number" class="form-control">
                  </div>
                  
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputtext" class="form-label"> <i class="bi bi-file-medical-fill" style="font-size: 18px;"></i> Dr. Name</label>
                    <input type="text" class="form-control">
                  </div>
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                     <label for="inputNumber" class="form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i> Patient Image</label>
                     <input class="form-control" type="file" id="formFile">
                  </div>

                  
                </div>
               
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Schedule</label>
                      <textarea class="form-control"></textarea>
                    </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-list-ul" style="font-size: 18px;"></i> About</label>
                      <textarea class="form-control"></textarea>
                    </div>
                </div>
               
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-12">
                    <a class="btn addsup-btn" href="appuser.php" role="submit">Save Changes</a>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <!--  --><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main>

<?= $this->endSection() ?>

