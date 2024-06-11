<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Appointments
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
                      <h5 class="card-title text-start">View Appointment</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('appointment') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">

              <div class="table-responsive">
              <form class="m-3">
                <div class="row">

                <div class="col-lg-4 pb-2 pb-lg-0">
    <i class="bi bi-image-fill" aria-hidden="true"></i>
    <label class="form-label" for="inputNanme4">
        <h5 class="text-center"><b>Profile Image: </b></h5>
    </label><br>

    <div style="display: flex; justify-content: center; align-items: center; height: 40%; width: 100%;">
    <img class="rounded-circle" width="100" height="100" src="<?= base_url() ?>public/images/<?= session('profile') && !empty(session('profile')) ? session('profile') : '1717391425.jpeg' ?>" onerror="this.onerror=null; this.src='<?= base_url() ?>public/images/1717391425.jpeg';" alt="Profile Image">
        </a><!-- End Profile Iamge Icon -->
    </div>




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
                        <i class="bi bi-person-circle" aria-hidden="true"></i>
                        <label class="form-label" for="inputNanme05"> <b> Patient Name:</b>
                        <?= isset($appointment['patient_name']) ? $appointment['patient_name'] : 'N/A'; ?>

                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-week-fill"
                          aria-hidden="true"></i>
                        <label class="form-label" for="inputdate"> <b> Birth Date:</b>
                        <?= isset($appointment['date_of_birth']) ? $appointment['date_of_birth'] : 'N/A'; ?>


                        </label>
                      </div>
                    </div>
                    <hr>
                    <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>
                            Email: </b></label>
                        <?= isset($appointment['email']) ? $appointment['email'] : 'N/A'; ?>
                      </div>



                      
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill"
                          aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Phone Number: </b>
                        <?= isset($appointment['phone']) ? $appointment['phone'] : 'N/A'; ?>

                        </label>
                      </div>
                      </div>

                      <hr>


                      <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-fill" aria-hidden="true"></i>
                        <label class="form-label" for="">
                          <b> Age: </b>
                        </label>
                        <?= isset($appointment['age']) ? $appointment['age'] : 'N/A'; ?> Years
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-gender-ambiguous" aria-hidden="true"></i>
                        <label class="form-label" for="">
                          <b> Gender: </b>
                        </label>
                        <?= isset($appointment['gender']) ? $appointment['gender'] : 'N/A'; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-file-medical-fill" aria-hidden="true"></i> <label class="form-label" for="">
                          <b>Specialty required: </b></label>

                        <?= isset($appointment['required_specialist']) ? $appointment['required_specialist'] : 'N/A'; ?>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-check-fill"></i>
                        <label class="form-label" for="inputNanme4"> <b> Appointment Date: </b>
                        </label>
                        <?= isset($appointment['appointment_date']) ? date('d/m/Y h:i A', strtotime($appointment['appointment_date'])) : 'N/A'; ?>

                      </div>
                      </div>
                      <hr>


                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0 ">
                        <i class="bi bi-check-square-fill"></i>
                          <label class="form-label m-0"><b>  Instruction:</b></label>
                          <span class="ms-2"><?= isset($appointment['lead_instruction']) ? $appointment['lead_instruction'] : 'N/A'; ?></span>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0 ">
                          <i class="bi bi-chat-left-text-fill me-2"></i>
                          <label class="form-label m-0"><b>Comment:</b></label>
                          <span class="ms-2"><?= isset($appointment['lead_comment']) ? $appointment['lead_comment'] : 'N/A'; ?></span>
                        </div>
                      </div>
                    <hr>

                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Enquiry note : </b></label>
                        <?= isset($appointment['note']) ? $appointment['note'] : 'N/A'; ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Appointment Note : </b></label>
                        <?= isset($appointment['note_for_team']) ? $appointment['note_for_team'] : 'N/A'; ?>

                    
                      </div>
                      </div>

                    <hr>

                    <div class="row">
                    <h4><b>Appointment Status</b></h4>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Appointment Status : </b></label>
                        <?= isset($appointment['appointment_status']) ? $appointment['appointment_status'] : 'N/A'; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Appointment Slot : </b></label>
                        <?= isset($appointment['schedule']) ? $appointment['schedule'] : 'N/A'; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Dr. Name  : </b></label>
                        <?= isset($appointment['doctor_name']) ? $appointment['doctor_name'] : 'N/A'; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Appointment About : </b></label>
                        <?= isset($appointment['note_for_team']) ? $appointment['note_for_team'] : 'N/A'; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Method : </b></label>
                        <?= isset($appointment['method']) ? $appointment['method'] : 'N/A'; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Instruction For Lead : </b></label>
                        <?= isset($appointment['instruction_for_lead']) ? $appointment['instruction_for_lead'] : 'N/A'; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Contacted Via : </b></label>
                        <?= isset($appointment['contacted_via']) ? $appointment['contacted_via'] : 'N/A'; ?>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Next Task To Assign : </b></label>
                        <?= isset($appointment['next_task_assign_to']) ? $appointment['next_task_assign_to'] : 'N/A'; ?>
                    </div>
                    
                    <hr>

                    <div class="row">
                      <label class="form-label" for="images"><b><i class="bi bi-images"></i> Documents : </b></label>
                      <div class="col-12">
                        <div class="row">

                        <!-- <?= isset($appointment['patient_name']) ? $appointment['patient_name'] : 'N/A'; ?> -->


                          <?php if (isset($data['enquiry']['image']) && !empty($data['enquiry']['image'])): ?>

                            <?php foreach ($data['enquiry']['image'] as $index => $image): ?>
                              <div class="col-1 col-lg-1 col-sm-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal"
                                  data-image="<?= $adminurl ?>/public/images/<?= $image ?>">
                                  <img src="<?= $adminurl ?>/public/images/<?= $image ?>" style="" width="50" height="50"
                                    class="m-1">
                                </a>
                              </div>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <div class="col-12 col-lg-12 col-sm-12">
                            Documents not Uploaded.
                            </div>
                          <?php endif; ?>
                        </div>
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
