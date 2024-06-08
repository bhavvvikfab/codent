<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Add-Appointment
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <h1>Add Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
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
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'appointment' ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body">

            <!-- No Labels Form -->
            <form class="row g-3" action="<?= base_url() . '' . session('prefix') . '/' . 'store_appointment' ?>"
              method="post" enctype="multipart/form-data">
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                  <i class="bi bi-question-circle-fill" style="font-size: 18px;"></i> Patient Name
                </label>
                <select class="form-select two" aria-label="Default select example" name="patient_name"
                  id="patient_name">
                  <option value="">--Select--Patient--</option>
                  <?php if (!empty($enquiries)): ?>
                    <?php foreach ($enquiries as $enquiry): ?>
                      <option value="<?= $enquiry['id'] ?>"><?= $enquiry['patient_name'] ?></option>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option value="">No Patient Available</option>
                  <?php endif; ?>

                </select>
                <small class="name_error text-danger"></small>

                <?php if (session('errors.patient_name')): ?>
                  <small class="text-danger"><?= esc(session('errors.patient_name')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                  <i class="bi bi-person-circle" style="font-size: 18px;"></i> Doctor Name
                </label>
                <select class="form-select two" aria-label="Select Referral Doctor" name="doctor_name" id="doctor_name">
                  <option value="">--Select--Doctor--</option>
                </select>
                <small class="dr_name_error text-danger"></small>
                <?php if (session('errors.doctor_name')): ?>
                  <small class="text-danger"><?= esc(session('errors.doctor_name')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
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
              </div>

              <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
              <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
              <link rel="stylesheet" type="text/css"
                href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
              <script>
                $(function () {
                  $('input[name="appointment_slot"]').daterangepicker({
                    singleDatePicker: true,
                    timePicker: true,
                    timePicker24Hour: false,
                    minDate: moment(),
                    locale: {
                      format: 'DD/MM/YYYY hh:mm A'
                    }
                  });
                });
              </script>


             

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-text-fill" style="font-size: 18px;"></i>
                  Appointment About</label>
                <textarea name="note" rows="1" class="form-control"></textarea>
                <!-- <input type="text" class="form-control" id="note" name="note"> -->
                <?php if (session('errors.note')): ?>
                  <small class="text-danger"><?= esc(session('errors.note')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
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
    showToast('Somethisn went Wrong...!');  
  </script>
<?php endif; ?>

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


    $('form').submit(function (event) {
      event.preventDefault(); // Prevent the default form submission

      // Clear previous error messages

      $('.name_error').text('');
      $('.dr_name_error').text('');
      $('.app_slot').text('');
      // Perform validation
      var patientName = $('#patient_name').val();
      var doctorName = $('#doctor_name').val();
      var appointmentSlot = $('#appointment_slot').val();
      // var referral = $('#referral').val();
      // var note = $('#note').val();

      // Validation for Patient Name
      if (patientName === '') {
        $('.name_error').text('Please select an enquiry.');
        return false;
      }

      // Validation for Doctor Name
      if (doctorName === '') {
        $('.dr_name_error').text('Please select an Doctor Name.');
        return false;
      }

      // Validation for Appointment Slot
      if (appointmentSlot === '') {
        $('.app_slot').text('Please select an Appointment Slot.');
        return false;
      }

      // Validation for Referral
      // if (referral === '') {
      //     $('[name="referral"]').after('<small class="error-msg text-danger">Please enter a referral.</small>');
      //     return false;
      // }

      // // Validation for Appointment About
      // if (note === '') {
      //     $('[name="note"]').after('<small class="error-msg text-danger">Please enter appointment details.</small>');
      //     return false;
      // }

      // If all fields are valid, you can proceed with form submission
      this.submit(); // Submit the form
    });

  });
</script>

<?= $this->endSection() ?>