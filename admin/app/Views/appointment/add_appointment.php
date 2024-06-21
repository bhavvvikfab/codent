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
                  <a href="<?= base_url('appointment') ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body">

            <!-- No Labels Form -->
            <form id="validat_form" class="row g-3" action="<?=base_url('register_form')?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
    <label for="patient_name"><i class="bi bi-question-circle-fill" style="font-size: 18px;"></i> Patient Name </label>
    <select name="patient_name" id="patient_name" class="form-control two select2">
        <option value="">Select a patient</option>
        <?php foreach ($enquiries as $enquiry): ?>
            <option value="<?= $enquiry['id'] ?>" data-hospital-id="<?= $enquiry['hospital_id'] ?>">
                <?= esc($enquiry['patient_name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div id="patient_name_error"></div>
    <?php if (session('errors.patient_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.patient_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
    <label for="doctor_name"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Doctor Name</label>
    <select name="doctor_name" id="doctor_name" class="form-control two">
        <option value="">Select a doctor</option>
        <!-- Doctor options will be populated by jQuery -->
    </select>
    <div id="doctor_name_error"></div>

    <?php if (session('errors.doctor_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.doctor_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>

             

<div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i>
                  Appointment Slot</label>
                <div class="input-group">
                  <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>
                  <input type="text" class="form-control rounded-2" id="appointment_slot" name="appointment_slot">
                </div>
                <small class="app_slot text-danger"></small>
                <?php if (session('errors.appointment_slot')): ?>
                  <small class="text-danger"><?= esc(session('errors.appointment_slot')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
                <div id="appointment_slot_error"></div>
              </div>

              

             
                


                  


              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-text-fill" style="font-size: 18px;"></i>
                  Appointment About</label>
                <input type="text" class="form-control" id="note" name="note">
                <?php if (session('errors.note')): ?>
                  <small class="text-danger"><?= esc(session('errors.note')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
                <div id="appointment_slot_error"></div>

              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <b><i class="bi bi-gear-fill" style="font-size: 18px;"></i></b> Method
                  </label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="method" placeholder="">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <b><i class="bi bi-file-earmark-text-fill" style="font-size: 18px;"></i></b> Instruction for Lead
                  </label>
                  <div class="input-group">
                    <textarea type="text" class="form-control" name="instruction_for_lead" rows="1" ></textarea>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <b><i class="bi bi-chat-fill" style="font-size: 18px;"></i></b> Contacted them Via
                  </label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="contacted_via" placeholder="">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <b><i class="bi bi-person-check-fill" style="font-size: 18px;"></i></b> Assign next task to
                  </label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="assign_next_to" placeholder="">
                  </div>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                <script type="text/javascript"
                  src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                <link rel="stylesheet" type="text/css"
                  href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    $(document).ready(function() 
    {

      $('#validat_form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Clear previous error messages
            $('.error-msg').remove();

            // Perform validation
            var patient_name = $('#patient_name').val();
            var doctor_name = $('#doctor_name').val();
            var appointment_slot = $('#appointment_slot').val();
            var referral = $('#referral').val();

            if (patient_name === '') {
                $('#patient_name_error').after('<small class="error-msg text-danger">Please select   patient name.</small>');
                return false;
            }

            if (doctor_name === '') {
                $('#doctor_name_error').after('<small class="error-msg text-danger">Please select doctor name.</small>');
                return false;
            }
            if (appointment_slot === '') {
                $('#appointment_slot_erro').after('<small class="error-msg text-danger">Please select appointment Date.</small>');
                return false;
            }

            if (referral === '') {
                $('#referral_erro').after('<small class="error-msg text-danger">Please enter referral.</small>');
                return false;
            }
            
            
this.submit();
        });




  $('.two').select2({
    // theme: 'bootstrap5', // Apply Bootstrap 4 theme
    // dropdownCssClass: 'bordered' // Add form-control class to the dropdown
  });


  $(function () {
                    $('input[name="appointment_slot"]').daterangepicker({
                      singleDatePicker: true,
                      timePicker: true,
                      timePicker24Hour: false,
                      minDate: moment(),
                      locale: {
                        format: 'DD/MM/YYYY hh:mm A',
                        meridiem: function (hour, minute, isAM) {
                            return hour < 12 ? 'AM' : 'PM';
                        }
                      }
                    });
                  });


$('#patient_name').change(function () {
        const selectedOption = $(this).find('option:selected');
        const hospitalId = selectedOption.data('hospital-id');

        if (hospitalId) {
            fetchDoctors(hospitalId);
        } else {
            $('#doctor_name').html('<option value="">Select a doctor</option>');
        }
    });

    function fetchDoctors(hospitalId) {
        $.ajax({
            url: `<?= base_url('get_doctors_by_hospital/') ?>${hospitalId}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#doctor_name').html('<option value="">Select a doctor</option>'); // Reset doctor options
                $.each(data, function (index, doctor) {
                    $('#doctor_name').append(`<option value="${doctor.id}">${doctor.fullname}</option>`);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching doctors:', error);
            }
        });
    }
});

  </script>

<?= $this->endSection() ?>