<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
View_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Hospital Details</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Hospital Details</li>
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
                      <h5 class="card-title text-start">View Hospital Details</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('hospitals') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">

              <div class="table-responsive">
            <form class="m-3">
              <div class="row">

                <div class="col-lg-4 pb-2 pb-lg-0">
                  
                  <i class="bi bi-image-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <h5><b>Hospital Image: </b></h5>
                  </label><br> 
                  
                   <img style="max-width: 100%;" height='auto' src="<?= base_url()?>public/images/<?= isset($hospital['profile']) && !empty($hospital['profile']) ? $hospital['profile'] : 'user-profile.jpg' ?>" >
                                             
                  <!--<img src="assets/img/profile-img.jpg" style="max-width: 100%;">-->
                  <pre>
                  <!--<? print_r($hospital)?>-->
                  <!--<? print_r($hospital_data)?>-->
                  <!--<? print_r($package)?>-->
                </pre>
                </div>

                <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                      <i class="bi bi-person-circle" aria-hidden="true"></i>
                      <label class="form-label" for="inputNanme05"> <b> Hospital Name:</b> </label> 
                      <?= $hospital['fullname']?>
                     </div>
                       
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-person-circle" aria-hidden="true"></i>
                      <label class="form-label" for="inputdate"> <b>Role:</b> Hospital
                    </label> 
                     </div>
                  </div>
              <hr>
              <div class="row">
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-envelope-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>  Email:</b></label> <?= $hospital['email']?>   
                   </div>

                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Phone Number: </b> <?= $hospital['phone']?>
                        </label>
                     </div>
                 
              </div>
              <hr>
              <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-list-ul" aria-hidden="true"></i> <label class="form-label" for=""> <b>About: </b></label> <?= $hospital_data['note']?> 
                   </div>

                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputaddress"> <b> Address: </b> 
                  </label> <?= $hospital['address']?>
                </div>
                                                    
                   

              </div>
              <hr>
              <div class="row">
                                                    
                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-alarm" aria-hidden="true"></i> <label class="form-label" for=""> <b>Plan duration: </b></label> <?= $package[0]['duration']?> 
                   </div>
                   
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-asterisk" aria-hidden="true"></i> <label class="form-label" for=""> <b>Current Plan: </b></label> <?= $package[0]['plan_name']?> 
                   </div>
            
              </div>
              <hr>
             <div class="row">
                                                    
                   <div class="col-lg-12 col-md-12 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-ticket-detailed-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>Plan-Details: </b></label> <?= $package[0]['details']?> 
                   </div>
                     
            
              </div>
             
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