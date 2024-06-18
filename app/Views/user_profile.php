<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Profile 
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <section class="my-dent-section ftco-section d-portal-bg d-flex flex-column justify-content-center">
      <div class="container">
        <div class="myoverlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 ftco-animate  ">
              <h1 class="h1hedaing text-center">Dentist Portal Profile</h1>
               
            </div>
          </div>
        </div>
      </div>
    </section>

<section class="ftco-section">
        <div class="container">
          <div class="row flex-row justify-content-between profile-page">
              <div class="col-md-4 ">
                    <div class="card">
                      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                      <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                          <img
    src="<?php echo base_url() . 'public/images/' . (isset($user['profile']) && !empty($user['profile']) ? $user['profile'] : '1718184797.jpeg'); ?>"
    onerror="this.onerror=null; this.src='<?php echo base_url(); ?>public/images/1718184797.jpeg';"
    class="rounded-circle img-thumbnail"
    style="max-width: 100px;">
                        <h3 class="font-weight-bold"> <?= esc($user['fullname']) ?> </h3>
                        <h6> Hospital </h6>
                        <div>
                            <a href="<?= base_url('logout') ?>" class="btn btn-primary py-2 px-5 w-70">Logout</a>
                       </div>
                      </div>
                      
                    </div>
              </div>
              <div class="col-md-8 profile-detail"> 
              
                  <div class="card">
                     
                                
                      <div class="card-body">
                      <div class="row">
                      <div class="col-lg-8">
                      <h4 class="mb-lg-4" style="color: #4154f1; font-weight: 600;"> Profile Details </h4>
                      </div>
                      <div class="col-lg-4 text-end">
    <a href="<?= base_url('edit_profile/'.$user['id']) ?>" class="btn btn-primary py-2 px-5 w-70">Edit Profile</a>
</div>

                      </div>

                      
                      <div class="col">

                          <div class="row">
                              <div class="col-lg-3 col-md-4 label "><i class="fa fa-user-circle-o"></i> Name</div>
                              <div class="col-lg-9 col-md-8 dtl"><?= esc($user['fullname']) ?></div>
                          </div>
                          <!-- <div class="row">
                              <div class="col-lg-3 col-md-4 label "><i class="fa fa-user-circle-o"></i> Last Name</div>
                              <div class="col-lg-9 col-md-8 dtl"><?= esc($user['fullname']) ?></div>
                          </div> -->
                          <div class="row">
                           
                              <div class="col-lg-3 col-md-4 label "><i class=" fa fa-file-text-o"></i> Date Of Birth</div>
                              <div class="col-lg-9 col-md-8 dtl"><?= esc($user['date_of_birth']) ?></div>
                          </div>
                          </div>

                          <div class="col">
                          <div class="row">
                              <div class="col-lg-3 col-md-4 label "><i class="fa fa-envelope"></i> Email Address</div>
                              <div class="col-lg-9 col-md-8 dtl"><?= esc($user['email']) ?></div>
                          </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label "><i class="fa fa-phone"></i> Phone Number</div>
                              <div class="col-lg-9 col-md-8 dtl"><?= esc($user['phone']) ?></div>
                          </div>
                          </div>
                          <div class="col">
                          <div class="row">
                              <div class="col-lg-3 col-md-4 label "><i class="fa fa-map-marker"></i> Address</div>
                              <div class="col-lg-9 col-md-8 dtl"><?= esc($user['address']) ?></div>
                          </div>
                          </div>

                          
                      </div>
                  </div>
              </div>
              <?php endforeach; ?>
    <?php else: ?>
        <p>No user data found.</p>
    <?php endif; ?>
          </div>
        </div>
</section>

<?= $this->endSection() ?>