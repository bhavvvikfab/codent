<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Edit-Appointment
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <h1>Edit Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
            <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Appointment </a></li> -->
            <li class="breadcrumb-item active">Edit Appointment</li>
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
                <h5 class="card-title text-start">Edit Appointment</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'appointment' ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body">

            <!-- No Labels Form -->
            <form class="row g-3 edit_form" action="<?= base_url() . '' . session('prefix') . '/' . 'update_appointment' ?>" method="post"
              enctype="multipart/form-data" >
              <input type="hidden" class="form-control rounded-2" id="id" name="id"
                value="<?= esc($appointment['id']) ?>">

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="patient_name"><i class="bi bi-question-circle-fill" style="font-size: 18px;"></i>
                  Enquiry</label>
                <select name="patient_name" id="patient_name" class="form-control two">
                  <?php if (isset($enquirys) && !empty($enquirys)) : ?>
                  <?php foreach ($enquirys as $enquiry): ?>
                    <option value="<?= $enquiry['id'] ?>" <?= $appointment['inquiry_id'] == $enquiry['id'] ? 'selected' : '' ?>><?= esc($enquiry['patient_name']) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
                <small class="name_error text-danger"></small>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="doctor_name"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Doctor
                  Name</label>
                <select name="doctor_name" id="doctor_name" class="form-control two">
                <option value="">--Select--Doctor--</option>
                <?php if (isset($doctor) && !empty($doctor)) : ?>
                <option value="<?= esc($doctor['id'])?>" selected ><?= esc($doctor['fullname'])?></option>
                <?php endif; ?>
                </select>
                <small class="dr_name_error text-danger"></small>
              </div>


              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i>
                  Appointment Slot</label>
                <div class="input-group">
                  <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>
                  <input type="date" class="form-control rounded-2" id="schedule" name="schedule"
                    value="<?= esc($appointment['schedule']) ?>">
                  <small class="app_slot text-danger"></small>
                  <div class="input-group-prepend">

                  </div>
                </div>
                <?php if (session('errors.appointment_slot')): ?>
                  <small class="text-danger"><?= esc(session('errors.appointment_slot')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
                <!-- <label class="col-form-label">Email Address</label> -->
                <!--  <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar3"></i></span>
                                        </div></span>
              <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div> -->
              </div>
              <!--<div class="col-lg-6 col-md-6 col-sm-12 mb-3">-->
              <!--  <label class="col-form-label"><i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email Address</label>-->
              <!--  <input type="text" class="form-control" value="john45@gmail.com" placeholder="Email address">-->
              <!--</div>-->

              <!--<div class="col-lg-6 col-md-6 col-sm-12 mb-3">-->
              <!--  <label class="col-form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>-->
              <!--  <input type="text" class="form-control" min="1" max="10" value="1593602464" placeholder="Phone Number">-->
              <!--</div>-->







              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i>
                  Referral</label>
                <input type="text" class="form-control" id="referral" name="referral"
                  value="<?= esc($appointment['lead_instruction']) ?>">
                <?php if (session('errors.referral')): ?>
                  <small class="text-danger"><?= esc(session('errors.referral')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-text-fill" style="font-size: 18px;"></i>
                  Appointment About</label>
                <input type="text" class="form-control" id="note" name="note" value="<?= esc($appointment['note']) ?>">
                <?php if (session('errors.note')): ?>
                  <small class="text-danger"><?= esc(session('errors.note')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
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
                <button type="submit" class="btn btn-dark"> Update </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
<script>

  $(document).ready(function () {
    $('.two').select2({
      // theme: 'bootstrap5', // Apply Bootstrap 4 theme
      // dropdownCssClass: 'bordered' // Add form-control class to the dropdown
    });

    $('#patient_name').on('change', function () {
      let id = $('#patient_name').val();
      // console.log(id);

      $.ajax({
        type: "GET",
        url: "<?= base_url() . '' . session('prefix') . '/' . 'get_dr_from_enquiry' ?>",
        data: { id: id },
        success: function (response) {
          $('#doctor_name').empty();
          let doc = JSON.parse(response);
          // console.log(doc);
          if (doc != null) {
            $('#doctor_name').append(`<option value="">--Select--Doctor--</option>`);
            doc.forEach(function (element) {
              $('#doctor_name').append(`<option value="${element.id}">${element.fullname}</option>`);
            });
          }

        },
        error: function (error) {
          console.log(error);
        }
      });
    });

  
    $('.edit_form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Clear previous error messages

        $('.name_error').text('');
        $('.dr_name_error').text('');
        $('.app_slot').text('');

        
        var patientName = $('#patient_name').val();
        var doctorName = $('#doctor_name').val();
        var appointmentSlot = $('#appointment_slot').val();
      

        if (patientName === '') {
            $('.name_error').text('Please select an enquiry.');
            return false;
        }

        if (doctorName === '') {
          $('.dr_name_error').text('Please select an Doctor Name.');
            return false;
        }

        if (appointmentSlot === '') {
          $('.app_slot').text('Please select an Appointment Slot.');
            return false;
        }

     

        this.submit();
    })


    
  });

</script>

<?= $this->endSection() ?>