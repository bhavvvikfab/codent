<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Edit-Enquiry
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <h1>Edit Enquiry</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
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
          <?php //print_r($enquiry) ?>
          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Edit Enquiry</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'enquiry' ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body">

            <!-- No Labels Form -->
            <form class="row g-3" method="post" id="add_enquiry" enctype="multipart/form-data"
              action="<?= base_url() . '' . session('prefix') . '/' . 'update_enquiry' ?>">
              <!-- <?php if (session('user_role') == 6): ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <i class="bi bi-hospital-fill" style="font-size: 18px;"></i>
                    Select Hospital
                  </label>
                  <select class="form-control hospitals" name="hospital">
                    <option value="">--Select--Hospital--</option>
                    <?php if (!empty($hospitals)): ?>
                      <?php foreach ($hospitals as $hospital): ?>
                        <option value="<?= $hospital['id'] ?>">
                          <?= $hospital['fullname'] ?>
                        </option>
                      <?php endforeach; ?>
                      <option value="0">No Hospitals Available</option>
                    <?php endif; ?>
                  </select>
                  <?php if (session('errors.hospital')): ?>
                    <small class="text-danger"><?= esc(session('errors.hospital')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>


              <?php endif; ?> -->

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient
                  Name</label>
                <input type="text" class="form-control" name="patient_name" value="<?= $enquiry['patient_name'] ?? '' ?>" >
              
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">

                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Birth
                  Date</label>
                <div class="input-group">
                  <span class="input-group-text rounded-2 btn-cal"><i class="bi bi-calendar3"></i></span>
                     <input type="date" class="form-control rounded-2"  max="2021-12-31" name="dob" value="<?= !empty($enquiry['date_of_birth']) ? date('Y-m-d', strtotime($enquiry['date_of_birth'])) : '' ?>">
                </div>
               

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i>
                  Appointment  Date and time</label>
                <div class="input-group app_date">
                  <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>
                  <input type="text" class="form-control rounded-2" name="app_date" value=" <?= $enquiry['appointment_date'] ?? '' ?>">
                </div>
               

                <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                <script type="text/javascript"
                  src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                <link rel="stylesheet" type="text/css"
                  href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
                <script>
                  $(function () {
                    $('input[name="app_date"]').daterangepicker({
                      singleDatePicker: true,
                      timePicker: true,
                      timePicker24Hour: false,
                      // minDate: moment(),
                      locale: {
                        format: 'DD/MM/YYYY hh:mm A'
                      }
                    });
                  });
                </script>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone
                  Number</label>
                <input type="phone" class="form-control" name="phone"  value="<?= $enquiry['phone'] ?? '' ?>" >
              </div>
              <div class="col-md-6">
                <label class="col-form-label"><i class="bi bi-file-medical-fill" style="font-size: 18px;"></i>
                  Specialty
                  required</label>
                  <select class="form-select" name="required_specialist">
                      <option value="n/a">--Specialty Required--</option>
                      <option value="orthodontics" <?= $enquiry['required_specialist'] == 'orthodontics' ? 'selected' : '' ?>>Orthodontics</option>
                      <option value="endodontics" <?= $enquiry['required_specialist'] == 'endodontics' ? 'selected' : '' ?>>Endodontics</option>
                      <option value="periodontics" <?= $enquiry['required_specialist'] == 'periodontics' ? 'selected' : '' ?>>Periodontics</option>
                      <option value="prosthodontics" <?= $enquiry['required_specialist'] == 'prosthodontics' ? 'selected' : '' ?>>Prosthodontics</option>
                      <option value="implantology" <?= $enquiry['required_specialist'] == 'implantology' ? 'selected' : '' ?>>Implantology</option>
                      <option value="radiology" <?= $enquiry['required_specialist'] == 'radiology' ? 'selected' : '' ?>>Radiology</option>
                      <option value="sedation" <?= $enquiry['required_specialist'] == 'sedation' ? 'selected' : '' ?>>Sedation</option>
                  </select>

              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-calendar-event-fill" style="font-size: 18px;"></i> Patient Age
                </label>
                <input type="number" class="form-control" name="age" value="<?= $enquiry['age'] ?? '' ?>" >
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-gender-ambiguous" style="font-size: 18px;"></i> Gender
                </label>
                <select class="form-control" name="gender">
                  <option value="">--Select Gender--</option>
                  <option value="male" <?= $enquiry['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                  <option value="female" <?= $enquiry['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                  <option value="other" <?= $enquiry['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
              </select>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email
                </label>
                <input type="email" class="form-control" name="email" value="<?= $enquiry['email'] ?? '' ?>" >
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-person-fill" style="font-size: 18px;"></i> Profile
                </label>
                <input type="file" class="form-control fileInput" name="profile">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label">
                    <i class="bi bi-geo-alt-fill" style="font-size: 18px;"></i> Address
                </label>
                <textarea type="text" class="form-control" name="address"  rows="1" ><?= $enquiry['address'] ?? '' ?></textarea>
            </div>


              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i>
                  Note</label>
                  .
                <textarea name="note" rows="1" class="form-control"><?= $enquiry['note'] ?? '' ?></textarea>

              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i>
                  Documents</label>
                <input type="file" class="form-control fileInput" name="images[]" multiple>
              </div>

                  <input type="hidden" value="<?= $enquiry['id'] ?? '' ?>" name="id" >
              <div class="d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-dark">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if (session()->has('error')): ?>
    <script>
      showToastError('<?= session('error')?>');  
    </script>
  <?php endif; ?>
</main><!-- End #main -->
<script>
    document.querySelectorAll('.fileInput').forEach(inputElement => {
    inputElement.addEventListener('change', function() {
        const files = this.files;
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; 
        const maxFileSize = 10 * 1024 * 1024; // 10MB
        
        this.nextElementSibling?.remove();

        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            if (!allowedTypes.includes(file.type)) {
                this.insertAdjacentHTML('afterend', '<small class="text-danger">Please select a valid image.</small>');
                this.value = ''; 
                return;
            }

            if (file.size > maxFileSize) {
                this.insertAdjacentHTML('afterend', '<small class="text-danger">Max file size is 10MB.</small>');
                this.value = ''; 
                return;
            }
          }
        });
     });

    $('#add_enquiry').submit(function (event) {
      event.preventDefault(); // Prevent form submission

      // Get form inputs
      var patientName = $('input[name="patient_name"]').val().trim();
      // var dob = $('input[name="dob"]').val().trim();
      var appDate = $('input[name="app_date"]').val().trim();
      var phone = $('input[name="phone"]').val().trim();
      var specialty = $('select[name="required_specialist"]').val().trim();
      // var referralDoctor = $('select[name="referral_doctor"]').val().trim();
      var note = $('textarea[name="note"]').val().trim();
      // var images = $('input[name="images[]"]').prop('files');


      var age = $('input[name="age"]').val().trim();
      var gender = $('select[name="gender"]').val().trim();
      var email = $('input[name="email"]').val().trim();
      var profile = $('input[name="profile"]').val().trim();
      var address = $('textarea[name="address"]').val().trim();

      // Validation
      var isValid = true;

      if (patientName === '') {
        isValid = false;
        $('input[name="patient_name"]').next('.text-danger').remove();
        $('input[name="patient_name"]').after('<small class="text-danger">Please enter the Patient name.</small>');
      }

      // if (dob === '') {
      //     isValid = false;
      //     $('input[name="dob"]').next('.text-danger').remove();
      //     $('input[name="dob"]').after('<small class="text-danger">Please enter the patient\'s date of birth.</small>');
      // }

      if (appDate === '') {
        isValid = false;
        $('input[name="app_date"]').next('.text-danger').remove();
        $('.app_date').after('<small class="text-danger">Please enter the appointment date.</small>');
      }

      if (phone === '' || phone.length < 8 || phone.length > 15) {
          isValid = false;
          $('input[name="phone"]').next('.text-danger').remove();
          $('input[name="phone"]').after('<small class="text-danger">Please enter a valid phone number.</small>');
      }

      if (specialty === 'n/a') {
        isValid = false;
        $('select[name="required_specialist"]').next('.text-danger').remove();
        $('select[name="required_specialist"]').after('<small class="text-danger">Please select a specialty.</small>');
      }

      // if (referralDoctor === '') {
      //     isValid = false;
      //     $('select[name="referral_doctor"]').next('.text-danger').remove();
      //     $('select[name="referral_doctor"]').after('<small class="text-danger">Please select a referral doctor.</small>');
      // }

      // if (note === '') {
      //     isValid = false;
      //     $('textarea[name="note"]').next('.text-danger').remove();
      //     $('textarea[name="note"]').after('<small class="text-danger">Please enter a note.</small>');
      // }

      // if (images.length === 0) {
      //     isValid = false;
      //     $('input[name="images[]"]').next('.text-danger').remove();
      //     $('input[name="images[]"]').after('<small class="text-danger">Please select at least one image.</small>');
      // }

      if (age === '') {
        isValid = false;
        $('input[name="age"]').next('.text-danger').remove();
        $('input[name="age"]').after('<small class="text-danger">Please enter the patient\'s age.</small>');
    }

    if (gender === '') {
        isValid = false;
        $('select[name="gender"]').next('.text-danger').remove();
        $('select[name="gender"]').after('<small class="text-danger">Please select a gender.</small>');
    }

    if (email === '') {
        isValid = false;
        $('input[name="email"]').next('.text-danger').remove();
        $('input[name="email"]').after('<small class="text-danger">Please enter an email address.</small>');
    }

    if (address === '') {
        isValid = false;
        $('textarea[name="address"]').next('.text-danger').remove();
        $('textarea[name="address"]').after('<small class="text-danger">Please enter an address.</small>');
    }


      // If form is valid, submit
      if (isValid) {
        this.submit();
      }
    });
</script>

<?= $this->endSection() ?>