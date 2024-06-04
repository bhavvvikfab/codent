<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Enquiries
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <h1>Edit Enquiry</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Enquiry </a></li> -->
            <li class="breadcrumb-item active">Edit Enquiry</li>
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
                      <h5 class="card-title text-start">Edit Enquiry</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end">
                          <a href="<?= base_url('enquiries') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <?php if (session('error')): ?>
                                        <small class="text-danger"><?= esc(session('error')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
            
          <div class="card-body">
          <?php if (!empty($enquiries) && is_array($enquiries)): ?>
            <?php foreach ($enquiries as $enquiry): ?>

                


            <!-- No Labels Form -->
            <form id="update_enquiry" class="row g-3" action="<?=base_url('update_enquiry')?>" method="post" enctype="multipart/form-data"> 




            <div class="col-md-6">
    <label class="col-form-label"><i class="bi bi-building-fill" style="font-size: 18px;"></i> Hospital</label>
    <select class="form-select single" aria-label="Default select example" name="hospital_id" id="hospital_id">
        <option value="">Select Hospital</option>
        <?php foreach ($hospitals as $hospital): ?>
            <option value="<?= esc($hospital['id']) ?>" <?= isset($enquiries[0]['hospital_id']) && $enquiries[0]['hospital_id'] == $hospital['id'] ? 'selected' : '' ?>>
                <?= esc($hospital['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div id="error_hopi"></div>

</div>




              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient Name</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $enquiry['id'] ?>">
                <input type="text" class="form-control" id="name" name="name" value="<?= $enquiry['patient_name'] ?>">
                <?php if (session('errors.name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Birth Date</label>
                <div class="input-group">
                        <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>                        
                       <input type="date" class="form-control rounded-2" id="dob" name="dob" id="bdate" value="<?= $enquiry['date_of_birth'] ?>">
                       <?php if (session('errors.dob')): ?>
                                        <small class="text-danger"><?= esc(session('errors.dob')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
        <div id="doberror"></div>

                       <div class="input-group-prepend">
                          
                            </div>
                     </div>


                     
                <!-- <label class="col-form-label">Email Address</label> -->
               <!--  <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3"></i></span>
                             </div></span>
  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div> -->
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i>  Appointmen Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" value="<?= $enquiry['appointment_date'] ?>" >
<div id="apperror"></div>
                
                <?php if (session('errors.appointment_date')): ?>
                                        <small class="text-danger"><?= esc(session('errors.appointment_date')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
              </div>
              
              

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                <input type="text" class="form-control" min="1" max="10" id="phone" name="phone" value="<?= $enquiry['phone'] ?>" >
                <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
              </div>
              <div class="col-md-6">
    <label class="col-form-label"><i class="bi bi-file-medical-fill" style="font-size: 18px;"></i> Specialty required</label>
    <select class="form-select" aria-label="Default select example" name="required_specialist" id="required_specialist" >
        <option value="Orthodontics" <?= $enquiry['required_specialist'] == 'Orthodontics' ? 'selected' : '' ?>>Orthodontics</option>
        <option value="Endodontics" <?= $enquiry['required_specialist'] == 'Endodontics' ? 'selected' : '' ?>>Endodontics</option>
        <option value="Periodontics" <?= $enquiry['required_specialist'] == 'Periodontics' ? 'selected' : '' ?>>Periodontics</option>
        <option value="Prosthodontics" <?= $enquiry['required_specialist'] == 'Prosthodontics' ? 'selected' : '' ?>>Prosthodontics</option>
        <option value="Implantology" <?= $enquiry['required_specialist'] == 'Implantology' ? 'selected' : '' ?>>Implantology</option>
        <option value="Radiology" <?= $enquiry['required_specialist'] == 'Radiology' ? 'selected' : '' ?>>Radiology</option>
        <option value="Sedation" <?= $enquiry['required_specialist'] == 'Sedation' ? 'selected' : '' ?>>Sedation</option>
    </select>
    <?php if (session('errors.required_specialist')): ?>
                                        <small class="text-danger"><?= esc(session('errors.required_specialist')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>


<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-chat-left-text-fill" style="font-size: 18px;"></i> Add Note</label>
                <input type="text" class="form-control" id="note" name="note" value="<?= $enquiry['note'] ?>" >
              </div>

<div class="col-md-6">
    <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i> Referral</label>
    <select class="form-select single" aria-label="Default select example" name="doctor_id" id="doctor_id">
        <option value="">--Select--Doctor--</option>
        <?php if (isset($doctors)): ?>
            <?php foreach ($doctors as $doctor): ?>
                <option value="<?= esc($doctor['id']) ?>" <?= isset($enquiries[0]['referral_doctor']) && $enquiries[0]['referral_doctor'] == $doctor['id'] ? 'selected' : '' ?>>
                    <?= esc($doctor['fullname']) ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <div id="doctorerror"></div>

</div>

<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
<label for="images"><i class="bi bi-image-fill" style="font-size: 18px;"></i> Upload Images</label>
    <input class="form-control" type="file" id="images" name="images[]" multiple>
    <div class="row">
    <?php
        // Decode the JSON string to an array
        $imagePaths = json_decode($enquiry['image'], true);

        // Check if $imagePaths is an array and not empty
        if (is_array($imagePaths) && !empty($imagePaths)) {
            foreach ($imagePaths as $index => $imagePath) {
                ?>
                <div class="col-4 col-lg-2 col-sm-4"> <!-- Adjust the column sizes as needed -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal<?= $index ?>">
                        <img src="<?= base_url('public/images/' . $imagePath) ?>" class="img-fluid m-1" alt="Image">
                    </a>
                </div>

                <!-- Modal for each image -->
                <div class="modal fade" id="imageModal<?= $index ?>" tabindex="-1" aria-labelledby="imageModalLabel<?= $index ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel<?= $index ?>">Image Preview</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= base_url('public/images/' . $imagePath) ?>" style="width: 100%;" class="" alt="Image Preview">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No images found."; // Handle case where no images are available
        }
        ?>
        </div>
    <?php if (session('errors.images')): ?>
                                        <small class="text-danger"><?= esc(session('errors.images')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>

              
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
                <button type="submit" class="btn btn-dark">Update</button>
              </div>
              <?php endforeach; ?>   
                  <?php else: ?>
        <p>No enquiries found.</p>
    <?php endif; ?>     
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  



</main><!-- End #main -->






<script>
    $(document).ready(function() {
  $('.single').select2({
    // theme: 'bootstrap5', // Apply Bootstrap 4 theme
    // dropdownCssClass: 'bordered' // Add form-control class to the dropdown
  });

  $('#update_enquiry').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Clear previous error messages
            $('.error-msg').remove();

            // Perform validation
            var hospital = $('#hospital').val();
            var name = $('#name').val();
            var dob = $('#dob').val();
            var appointment_date = $('#appointment_date').val();
            var phone = $('#phone').val();
            var specialty = $('#specialty').val();
            var doctor = $('#doctor').val();

            // var email = $('#email').val();
            // var password = $('#password').val();
            // var address = $('#address').val();
            // var qualification = $('#qualification').val();
            // var schedule = $('#schedule').val();
            // var about = $('#about').val();
            // var image = $('#image').val();
            // var specialistOrPractice = $('#specialistOrPractice').val();

            if (hospital === '') {
                $('#error_hopi').after('<small class="error-msg text-danger">Please select hospital.</small>');
                return false;
            }
            
            if (name === '') {
                $('#name').after('<small class="error-msg text-danger">Please enter a name.</small>');
                return false;
            }

            if (dob === '') {
                $('#doberror').html('<small class="error-msg text-danger">Please enter a date of birth.</small>');
                return false; 
            }

            if (appointment_date == '') {
                $('#apperror').html('<small class="error-msg text-danger">Please enter a appointment date.</small>');
                return false;
            }
            if (phone === '') {
    $('#phone').after('<small class="error-msg text-danger">Please enter a phone number.</small>');
    return false; 
} else if (!(/^\d{10}$/.test(phone))) {
    $('#phone').after('<small class="error-msg text-danger">Please enter a 10-digit phone number.</small>');
    return false;
}
            if (specialty === 'n/a') {
                $('#specialtyerror').html('<small class="error-msg text-danger">Please select a specialist.</small>');
                return false; 
            
              }
              if (doctor === '') {
                $('#doctorerror').after('<small class="error-msg text-danger">Please select doctor.</small>');
                return false;
            }
            this.submit();
        });

});

</script>



<?= $this->endSection() ?>
