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
            <form  class="row g-3" action="<?=base_url('update_form')?>" method="post" enctype="multipart/form-data"> 




            <div class="col-md-6">
    <label class="col-form-label"><i class="bi bi-building-fill" style="font-size: 18px;"></i> Dental practice</label>
    <select class="form-select single" aria-label="Default select example" name="hospital_id" id="hospital_id">
        <option value="">Select Hospital</option>
        <?php foreach ($hospitals as $hospital): ?>
            <option value="<?= esc($hospital['id']) ?>" <?= isset($enquiries[0]['hospital_id']) && $enquiries[0]['hospital_id'] == $hospital['id'] ? 'selected' : '' ?>>
                <?= esc($hospital['fullname']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div id="hospital_error" class="error-msg text-danger"></div>
</div>




              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient Name</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $enquiry['id'] ?>">
                <input type="text" class="form-control" id="name" name="name" value="<?= $enquiry['patient_name'] ?>">
    <div id="name_error" class="error-msg text-danger"></div>

                <?php if (session('errors.name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Birth Date</label>
                <div class="input-group">
                        <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>                        
                       <input type="date" class="form-control rounded-2" id="dob" name="dob"  value="<?= $enquiry['date_of_birth'] ?>">

                     </div>
                                   
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-calendar-event-fill" style="font-size: 18px;"></i> Patient Age
                </label>
                <input type="number" class="form-control" id="age" name="age" value="<?= $enquiry['age'] ?>">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label" >
                    <i class="bi bi-gender-ambiguous" style="font-size: 18px;"></i> Gender
                </label>
                <select class="form-control" id="gender" name="gender">
    <option value="">--Select Gender--</option>
    <option value="male" <?= (isset($enquiry['gender']) && $enquiry['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
    <option value="female" <?= (isset($enquiry['gender']) && $enquiry['gender'] == 'female') ? 'selected' : '' ?>>Female</option>
    <option value="other" <?= (isset($enquiry['gender']) && $enquiry['gender'] == 'other') ? 'selected' : '' ?>>Other</option>
</select>

                <div id="gender_error"></div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email
                </label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $enquiry['email'] ?>">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-geo-alt-fill" style="font-size: 18px;"></i> Address
                </label>
                <textarea type="text" class="form-control" id="address" name="address"  rows="1" ><?= $enquiry['address'] ?>"</textarea>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                <input type="text" class="form-control" min="1" max="10" id="phone" name="phone" value="<?= $enquiry['phone'] ?>" >
               <div id="phone_error" class="error-msg text-danger"></div>
                
              </div>

            

              
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i>  Appointmen Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" value="<?= $enquiry['appointment_date'] ?>" >
                <div id="hospital_error" class="error-msg text-danger"></div>

              <div id="appointment_date_error" class="error-msg text-danger"></div>
                
                
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
    <div id="required_specialist_error" class="error-msg text-danger"></div>

    
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
    <div id="hospital_error" class="error-msg text-danger"></div>


</div>


<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-chat-left-text-fill" style="font-size: 18px;"></i> Add Note</label>
                <input type="text" class="form-control" id="note" name="note" value="<?= $enquiry['note'] ?>" >
    <div id="note_error" class="error-msg text-danger"></div>

              </div>



<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
<label for="images"><i class="bi bi-image-fill" style="font-size: 18px;"></i>Upload New Images</label>
    <input class="form-control" type="file" id="images" name="images[]" multiple>
    
   
</div>

<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label >
                    <i class="bi bi-person-fill" style="font-size: 18px;"></i> Profile
                </label>
                <input type="file" class="form-control" name="profile">
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

  $('#errors_form').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Clear previous error messages
    $('.error-msg').remove();

    // Perform validation
    var hospital_id = $('#hospital_id').val();
    var name = $('#name').val();
    var dob = $('#dob').val();
    var appointment_date = $('#appointment_date').val();
    var phone = $('#phone').val();
    var required_specialist = $('#required_specialist').val();
    var note = $('#note').val();
    var doctor = $('#doctor_id').val();

    var isValid = true; // Flag to track overall form validity
    var errors = []; // Array to store error messages

    if (hospital_id === '') {
        isValid = false;
        $('#hospital_error').html('Please select a hospital.');
    }

    // Validate Name
    if (name === '') {
        isValid = false;
        $('#name_error').after('<small class="error-msg text-danger">Please enter a name.</small>');
    }

    // Validate DOB
    if (dob === '') {
        isValid = false;
        $('#dob_error').after('<small class="error-msg text-danger">Please enter date of birth.</small>');
    }

    // Validate Appointment Date
    if (appointment_date === '') {
        isValid = false;
        $('#appointment_date_error').after('<small class="error-msg text-danger">Please enter an appointment date.</small>');
    }

    // Validate Specialty
    if (required_specialist === '') {
        isValid = false;
        $('#required_specialist_error').after('<small class="error-msg text-danger">Please select a specialty.</small>');
    }

    // Validate Doctor
    if (doctor === '') {
        isValid = false;
        errors.push('Please select a doctor.');
    }

    // Validate Note
    if (note === '') {
        isValid = false;
        $('#note_error').after('<small class="error-msg text-danger">Please enter a note.</small>');
    }

    // Display general errors
    if (!isValid) {
        var errorMessage = '<div class="error-msg text-danger">' + errors.join('<br>') + '</div>';
        $('#general-error').html(errorMessage);
    } else {
        // If all validations pass, submit the form
        this.submit();
    }
});



  

});

</script>



<?= $this->endSection() ?>
