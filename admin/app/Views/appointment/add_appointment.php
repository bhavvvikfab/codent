<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Appointments
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <h1>Add Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Appointment </a></li> -->
            <li class="breadcrumb-item active">Add Appointment</li>
          </ol>
        </nav>
      </div>
      <!--<div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">-->
      <!--  <div class="d-flex justify-content-end align-items-center">-->
      <!--    <button type="button" class="btn btn-primary"> <a href="orders.php"> <i class="ri-arrow-left-line"></i> Back </a> </button>-->
      <!--  </div>-->
      <!--</div>-->
    </div>
  </div>
  <section class="section" id="editorder467">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
            
            <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Add Appointment</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end">
                          <a href="<?= base_url('appointment') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>
            
          <div class="card-body">
       
            <!-- No Labels Form -->
            <form class="row g-3" action="<?=base_url('register_form')?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
    <label class="col-form-label">
        <i class="bi bi-question-circle-fill" style="font-size: 18px;"></i> Enquiry 
    </label>
    <select class="form-select two" aria-label="Default select example" name="patient_name" id="patient_name">
    <option value="">Select Referral Enquery</option>

        <?php foreach ($enquiries as $enquiry): ?>

            <option value="<?= $enquiry['id'] ?>"><?= $enquiry['patient_name'] ?></option>
        <?php endforeach; ?>
    </select>
    <?php if (session('errors.patient_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.patient_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
    <label class="col-form-label">
        <i class="bi bi-person-circle" style="font-size: 18px;"></i> Doctor Name
    </label>
    <select class="form-select two" aria-label="Select Referral Doctor" name="doctor_name" id="doctor_name">
        <option value="">Select Referral Doctor</option>
        <?php foreach($enquiries as $enquiry): ?>
            <?php if(isset($enquiry['referral_doctor_id']) && isset($enquiry['referral_doctor_name'])): ?>
                <option value="<?= $enquiry['referral_doctor_id']; ?>">
                    <?= $enquiry['referral_doctor_name']; ?>
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <?php if (session('errors.doctor_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.doctor_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Appointment Slot</label>
                <div class="input-group">
                        <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>                        
                       <input type="date" class="form-control rounded-2" id="appointment_slot" name="appointment_slot" >
                       
                      
                     </div>
                     <?php if (session('errors.appointment_slot')): ?>
                                        <small class="text-danger"><?= esc(session('errors.appointment_slot')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                <!-- <label class="col-form-label">Email Address</label> -->
               <!--  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3"></i></span>
                             </div></span>
  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div> -->
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i> Referral</label>
                <input type="text" class="form-control" name="referral" id="referral" >
                <?php if (session('errors.referral')): ?>
                                        <small class="text-danger"><?= esc(session('errors.referral')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-text-fill" style="font-size: 18px;"></i> Appointment About</label>
                <input type="text" class="form-control" id="note" name="note">
                <?php if (session('errors.note')): ?>
                                        <small class="text-danger"><?= esc(session('errors.note')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
              </div>

              
              

              

              <!-- <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Doctor Name</label>
                <input type="text" class="form-control" id="appointment_slot" name="appointment_slot">
              </div> -->

              <!-- <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-medical-fill" style="font-size: 18px;"></i> Specialty Of </label>
                <select class="form-select" aria-label="Default select example" id="appointment_slot" name="appointment_slot">
                 <option value="dry-cleaning" selected>Specialty required </option> -->
                  <!-- <option value="dry-cleaning" selected>Orthodontics</option> -->
                  <!-- <option value="dry-cleaning">Endodontics</option>
                  <option value="dry-cleaning">Periodontics</option>
                  <option value="dry-cleaning">Prosthodontics</option>
                  <option value="dry-cleaning">Implantology</option>
                  <option value="dry-cleaning">Radiology</option> 
                  <option value="dry-cleaning">Sedation</option>
                </select> -->
              <!-- </div>  -->

              <!-- <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i> Referral</label>
                <input type="text" class="form-control" id="appointment_slot" name="appointment_slot">
              </div> -->

             
              

              <!-- <div class="col-md-12">
                <div class="product-description-card-body">
                  <label class="col-form-label">Product Description</label>
                  <div class="quill-editor-default">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-md-12 col-12">
                  <label class="col-form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i> Patient Image Upload</label>
                  <div class="order-images">
                    <img src="assets/img/profile-img.jpg" alt="product-img">
                      <div class="d-flex editimages-button align-items-center pt-2">
                          <input type="file" class="custom-file-input image-gallery" id="image-gallery" accept="image/png, image/jpeg" name="image-gallery[]" multiple accept="image/*" style="display: none;">
                          <label class="custom-file-label btn btn-success m-1" for="image-gallery">
                            <i class="bi bi-file-earmark-arrow-up"></i>
                          </label>
                          <button type="button" class="btn btn-primary m-1"><i class="ri-delete-bin-line"></i></button>
                      </div>
                  </div>
              </div> -->
              <div class="d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-dark"> Add Appointment </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</main><!-- End #main -->
<?php if (session()->has('status') && session('status') == 'error'): ?>
      <script>
            showToast('Somethisn Is Wrong....Please Try Agian Later');  
        </script>
    <div class="alert alert-danger"></div>
<?php endif; ?>

<script>
    $(document).ready(function() {
  $('.two').select2({
    // theme: 'bootstrap5', // Apply Bootstrap 4 theme
    // dropdownCssClass: 'bordered' // Add form-control class to the dropdown
  });
});
  </script>

<?= $this->endSection() ?>
