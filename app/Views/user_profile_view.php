<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Profile 
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
  .text-start {
    margin-block-start: 15px;
    margin-inline-end: auto;
}
.spce{
  margin-right: -22px;
}
.profile-detail .row
{
  margin-bottom: 21px;
}
</style>

    <section class="my-dent-section ftco-section d-portal-bg d-flex flex-column justify-content-center">
      <div class="container">
        <div class="myoverlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 ftco-animate  ">
              <h1 class="h1hedaing text-center">Patient Profile</h1>
               
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
                      <div class="card-body profile-card pt-3 d-flex flex-column align-items-center">
                      <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                          <img
    src="<?php echo base_url() . 'public/images/' . (isset($user['profile']) && !empty($user['profile']) ? $user['profile'] : '1718184797.jpeg'); ?>"
    onerror="this.onerror=null; this.src='<?php echo base_url(); ?>public/images/1718184797.jpeg';"
    class="rounded-circle img-thumbnail"
    style="max-width: 100px;">
                        <h3 class="font-weight-bold"> <?= esc($user['patient_name']) ?> </h3>
                        <div class="spce">
                        <div class="text-start"> <i class="fa fa-file-text"></i> <b>Date Of Birth</b> : <?= esc($user['date_of_birth']) ?> </div>
                        <div class="text-start"> <i class="fa fa-phone"></i> <b>Phone Number</b> : <?= esc($user['phone']) ?> </div>

                        <div class="text-start"> <i class="fa fa-user"></i> <b>Age</b> : <?= esc($user['age']) ?> </div>
                        <div class="text-start"> <i class="fa fa-venus-mars"></i> <b>Gender</b> : <?= esc($user['gender']) ?> </div>
                        </div>
                        
                        
                      </div>
                      
                    </div>
              </div>
              <div class="col-md-8 profile-detail"> 
              
                  <div class="card">
                     
                                
                      <div class="card-body">
                      <div class="row">
                      <div class="col-lg-8">
                      <h4 class="mb-lg-6" style="color: #4154f1; font-weight: 550;"> Patient Details </h4>
                      </div>
                      <div class="col-lg-4 text-end">
    <a href="<?= base_url('referral') ?>" class="btn btn-primary py-2 px-5 w-70">Back</a>
</div>
                      

                      </div>

                          <div class="col">
                          <div class="row">
                              <div class="col-lg-4 col-md-4 label "><i class="fa fa-envelope"></i> Email Address</div>
                              <div class="col-lg-6 col-md-8 dtl"><?= esc($user['email']) ?></div>
                          </div>
                         
                          </div>
                          <div class="col">
    <div class="row">
        <div class="col-lg-4 col-md-4 label "><i class="fa fa-map-marker"></i> Address</div>
        <div class="col-lg-6 col-md-8 dtl"><?= esc($user['address']) ?></div>
    </div>
    
   
    <div class="row">
        <div class="col-lg-4 col-md-4 label "><i class="fa fa-stethoscope"></i> Specialty required</div>
        <div class="col-lg-6 col-md-8 dtl"><?= esc($user['required_specialist']) ?></div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 label "><i class="fa fa-calendar"></i> Appointment Date</div>
        <div class="col-lg-6 col-md-8 dtl"><?= esc($user['appointment_date']) ?></div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 label "><i class="fa fa-sticky-note"></i> Note</div>
        <div class="col-lg-6 col-md-8 dtl"><?= esc($user['note']) ?></div>
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