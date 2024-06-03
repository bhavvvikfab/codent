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
              <form action="<?=base_url('update_patient_form')?>" method="post" enctype="multipart/form-data">
              <?php if (!empty($patients) && is_array($patients)) : ?>
                  <?php $serial = 1;?> 
                  <?php foreach ($patients as $patient) : ?>
                <div class="row ">                  
                <input type="hidden" class="form-control" id="id" name="id"  value="<?= $patient['id'] ?>">

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient Name</label>
                      <input type="text" class="form-control" id="name" name="name"  value="<?= $patient['fullname'] ?>">
                      <?php if (session('errors.name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="email" class="form-label"> <i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $patient['email'] ?>">
                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger"><?= esc(session('errors.email')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                  </div>
                </div>

                <div class="row">                                 
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $patient['phone'] ?>">
                    <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="date" class="form-label"> <i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?= $patient['date_of_birth'] ?>">
                    <?php if (session('errors.date_of_birth')): ?>
                                        <small class="text-danger"><?= esc(session('errors.date_of_birth')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                  </div>
                  
                </div>

                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-house-door-fill" style="font-size: 18px;"></i> Address</label>
                      <textarea class="form-control" id="address" name="address"><?= $patient['address'] ?></textarea>
                      <?php if (session('errors.address')): ?>
                                        <small class="text-danger"><?= esc(session('errors.address')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                     <label for="file" class="form-label"><i class="bi  bi-image-fill" style="font-size: 18px;"></i> Patient Image</label>
                     <?php if (!empty($patient['profile'])): ?>
                     <div class="mb-3">
                     <img class="img-thumbnail" style="max-width: 70px;" src="<?= base_url() ?>public/images/<?= isset($patient['profile']) && !empty($patient['profile']) ? $patient['profile'] : '1717391425.jpeg' ?>" onerror="this.onerror=null; this.src='<?= base_url() ?>public/images/1717391425.jpeg';" alt="Profile Image">
                      <!-- <img src="<?= base_url('public/images/' . $patient['profile']) ?>" alt="Profile Image" class="img-thumbnail" style="max-width: 70px;"> -->
                     </div>
                    <?php endif; ?>
                     <input class="form-control" type="file" id="image" name="image"  value="<?= $patient['profile'] ?>">
                     <br>
                     
                  </div>
                   
                </div>
             
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-12">
                    <button class="btn addsup-btn"  type="submit">Update</button>
                  </div>
                </div>

                <?php endforeach; ?>
                  <?php else : ?>
                  <p>No patients found.</p>
                  <?php endif; ?>
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

