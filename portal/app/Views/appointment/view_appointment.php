<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Appointment-Details
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">View Appointment</li>
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
                      <h5 class="card-title text-start">Appointment Details</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url() . '' . session('prefix') . '/' . 'appointment' ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">

              <div class="table-responsive">
            <form class="m-3">
              <div class="row">

                <div class="col-lg-4 pb-2 pb-lg-0">
                  
                  <i class="bi bi-image-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <h5><b> Patient Image: </b></h5>
                  </label><br> <img src="assets/img/profile-img.jpg" style="max-width: 100%;">
                  <!-- 
                  <label class="form-label" for="inputNanme4"> <b> User Image: </b>
                  </label> 
                  <img src="assets/img/josh-d-avatar.jpg">
                     <div class="user-view-thumbnail">
                          <img src="assets/img/josh-d-avatar.jpg">
                    </div>               -->

                </div>

                <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                      <i class="bi bi-question-circle-fill" aria-hidden="true"></i>
                      <label class="form-label" for="inputNanme05"> <b> Enquiry:</b> Lorem</label>   
                     </div>
                       
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-week-fill" aria-hidden="true"></i>
                      <label class="form-label" for="inputdate"> <b> Birth Date</b> 13/2/1996
                    </label> 
                     </div>
                  </div>
              <hr>
              <!--<div class="row">-->
                                            
                
              <!--    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">-->
              <!--      <i class="bi bi-envelope-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>  Email:</b></label>mail123@gmail.com    -->
              <!--     </div>-->

              <!--      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill" aria-hidden="true"></i>-->
              <!--          <label class="form-label" for=""> <b> Phone Number: </b> 1596324870-->
              <!--          </label>-->
              <!--       </div>-->
                 
              <!--</div>-->
              <!--<hr>-->
              <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-person-circle" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <b> Doctor Name: </b> 
                  </label> Dr. Kiran Khanna
                </div>
                                                    
                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-file-medical-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>Specialty required: </b></label> Endodontics  
                   </div>

              </div>
              <hr>

              <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-file-earmark-medical-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <b> Referal: </b> 
                  </label> Dr. XYZ
                </div>
                                                    
                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-file-earmark-text-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>Appointment About: </b></label> Lorem Ipsum  
                   </div>

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