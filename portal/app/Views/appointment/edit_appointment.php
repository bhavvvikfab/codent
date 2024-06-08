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
            <form class="row g-3 edit_form"
              action="<?= base_url() . '' . session('prefix') . '/' . 'update_appointment' ?>" method="post"
              enctype="multipart/form-data">
              <input type="hidden" class="form-control rounded-2" id="id" name="id"
                value="<?= esc($appointment['id']) ?? '' ?>">

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="patient_name"><i class="bi bi-question-circle-fill" style="font-size: 18px;"></i>
                  Enquiry</label>
                <select name="patient_name" id="patient_name" class="form-control two">
                  <?php if (isset($enquirys) && !empty($enquirys)): ?>
                    <?php foreach ($enquirys as $enquiry): ?>
                      <option value="<?= $enquiry['id'] ?? '' ?>" <?= $appointment['inquiry_id'] == $enquiry['id'] ? 'selected' : '' ?>><?= esc($enquiry['patient_name']) ?? '' ?></option>
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
                  <?php if (isset($doctor) && !empty($doctor)): ?>
                    <option value="<?= esc($doctor['id']) ?? ''  ?>" selected><?= esc($doctor['fullname']) ?? '' ?></option>
                  <?php endif; ?>
                </select>
                <small class="dr_name_error text-danger"></small>
              </div>


              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i>
                  Appointment Slot</label>
                <div class="input-group">
                  <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>
                  <input type="text" class="form-control rounded-2" id="schedule" name="schedule"
                    value="<?= esc($appointment['schedule']) ?? '' ?>">
                  <small class="app_slot text-danger"></small>
                </div>

                <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                <script type="text/javascript"
                  src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                <link rel="stylesheet" type="text/css"
                  href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
                <script>
                  $(function () {
                    $('input[name="schedule"]').daterangepicker({
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
                <?php if (session('errors.appointment_slot')): ?>
                  <small class="text-danger"><?= esc(session('errors.appointment_slot')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
               
              </div>
              

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-text-fill" style="font-size: 18px;"></i>
                  Appointment About</label>
                  <textarea name="note" rows="1"  id="note" class="form-control"><?= esc($appointment['note_for_team']) ?? '' ?></textarea>
                
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
                    <input type="text" class="form-control" name="method" placeholder="" value="<?= esc($appointment['method']) ?? '' ?>" >
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <b><i class="bi bi-file-earmark-text-fill" style="font-size: 18px;"></i></b> Instruction for Lead
                  </label>
                  <div class="input-group">
                    <textarea type="text" class="form-control" name="instruction_for_lead" rows="1" ><?= esc($appointment['instruction_for_lead']) ?? '' ?></textarea>
                  </div>
                </div>
              
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <b><i class="bi bi-chat-fill" style="font-size: 18px;"></i></b> Contacted them Via
                  </label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="contacted_via" placeholder="" value="<?= esc($appointment['contacted_via']) ?? '' ?>" >
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <b><i class="bi bi-person-check-fill" style="font-size: 18px;"></i></b> Assign next task to
                  </label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="assign_next_to" placeholder="" value="<?= esc($appointment['next_task_assign_to']) ?? '' ?>" >
                  </div>
                </div>


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


    $('.edit_form').submit(function (event) {
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