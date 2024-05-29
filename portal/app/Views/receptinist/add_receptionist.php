<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Add-Receptionist
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Add New Receptionist</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() . '' . session('prefix') . '/' . 'reception' ?>">All
                Receptionist</a></li>
            <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Enquiry </a></li> -->
            <li class="breadcrumb-item active">Add New Receptionist</li>
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
                <h5 class="card-title text-start">Add New Receptionist</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'reception' ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>
          <div class="card-body">


            <!-- General Form Elements -->
            <form action="<?= base_url() . '' . session('prefix') . '/' . 'reception_register' ?>" method="post"
              enctype="multipart/form-data">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="name" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Full
                    Name</label>
                  <input type="text" class="form-control" name="name">
                  <?php if (session('errors.name')): ?>
                    <small class="text-danger"><?= esc(session('errors.name')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="email" class="form-label"><i class="bi bi-envelope-fill" style="font-size: 18px;"></i>
                    Email
                  </label>
                  <input type="email" class="form-control" name="email">
                  <?php if (session('errors.email')): ?>
                    <small class="text-danger"><?= esc(session('errors.email')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="password" class="form-label"> <i class="bi bi-eye-fill" style="font-size: 18px;"></i>
                    Password</label>
                  <input type="password" class="form-control" name="password">
                  <?php if (session('errors.password')): ?>
                    <small class="text-danger"><?= esc(session('errors.password')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="dob" class="form-label"> <i class="bi bi-calendar-fill" style="font-size: 18px;"></i> Date
                    of Birth</label>
                  <input type="date" class="form-control" name="dob">
                  <?php if (session('errors.dob')): ?>
                    <small class="text-danger"><?= esc(session('errors.dob')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>

              </div>

              <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="address" class="form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i>
                    Profile</label>
                  <input type="file" class="form-control" name="image">
                  <?php if (session('errors.image')): ?>
                    <small class="text-danger"><?= esc(session('errors.image')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="phone" class="form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i>
                    Phone</label>
                  <input class="form-control" type="phone" name="phone">
                  <?php if (session('errors.phone')): ?>
                    <small class="text-danger"><?= esc(session('errors.phone')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>


              </div>

              <div class="row">
                <!-- <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Schedule</label>
                      <textarea class="form-control"></textarea>
                    </div>
                   <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-list-ul" style="font-size: 18px;"></i> About</label>
                      <textarea class="form-control"></textarea>
                    </div> -->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label for="address" class="form-label"><i class="bi bi-geo-alt-fill" style="font-size: 18px;"></i>
                    Address</label>
                  <textarea name="address" placeholder="Address..." class="form-control" rows="1"></textarea>
                  <?php if (session('errors.address')): ?>
                    <small class="text-danger"><?= esc(session('errors.address')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>
              </div>

              <div class="row mb-3">
                <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                <div class="col-sm-12">
                  <button class="btn addsup-btn" type="submit">Add Receptionist</button>
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

  <?php if (session('error')): ?>
    <script>
      showToast('Something want wrong...!!.');  
    </script>
  <?php endif; ?>
</main>

<?= $this->endSection() ?>