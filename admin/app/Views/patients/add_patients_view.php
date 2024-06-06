<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Patients
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Add New Patient</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New Patient</li>
          </ol>
        </nav>
      </div>
    </div>
    </div>

<section class="section" id="adduserform123">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Add Patient</h5>
                  </div>
                   <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('patient') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>
            <div class="card-body">
         

              <!-- General Form Elements -->
              <form id="patient_form" action="<?=base_url('register_patient_data')?>" method="post" enctype="multipart/form-data">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient Name</label>
                      <input type="text" class="form-control" id="name" name="name" >
                      <?php if (session('errors.name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.name')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                      
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="email" class="form-label"> <i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email Address</label>
                    <input type="email" class="form-control"  id="email" name="email">
                    <div id="emailError"></div>
                    
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"><i class="bi bi-lock-fill" style="font-size: 18px;"></i> Password</label>
                      <input type="password" class="form-control"  id="password" name="password">
                      <?php if (session('errors.password')): ?>
                                        <small class="text-danger"><?= esc(session('errors.password')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                    <input type="number" class="form-control"  id="phone" name="phone">
                    <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                  </div>
                  
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputAddress" class="form-label"> <i class="bi bi-house-door-fill" style="font-size: 18px;"></i> Address</label>
                    <textarea class="form-control" id="address" name="address" rows="1"></textarea>
                    <?php if (session('errors.address')): ?>
                                        <small class="text-danger"><?= esc(session('errors.address')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>

                  </div>
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                     <label for="inputDOB" class="form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Date of Birth</label>
                     <input class="form-control" type="date" id="date_of_birth"   name="date_of_birth">
                     <?php if (session('errors.date_of_birth')): ?>
                                        <small class="text-danger"><?= esc(session('errors.date_of_birth')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
                  </div>

                  
                </div>
               
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputImage" class="form-label"> <i class="bi bi-image-fill" style="font-size: 18px;"></i> Profile Image</label>
                      <input class="form-control" type="file" id="image" name="image" accept="image/*">

                    </div>
                      
                </div>
                <br>
               
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-12">
                    <button  class="btn addsup-btn"  type="submit">Add Patient</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <!--  --><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php if (session()->has('status') && session('status') == 'error'): ?>
      <script>
            showToast('There was an error during registration. Please try again.!!');  
        </script>
    <div class="alert alert-danger"></div>
<?php endif; ?>

</main>
<script>
   $(document).ready(function() {
    $('#patient_form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Clear previous error messages
        $('.error-msg').remove();

        // Perform validation
        var isValid = true; // Flag to track if the form is valid

        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var address = $('#address').val();
        var date_of_birth = $('#date_of_birth').val();
        var phone = $('#phone').val();
        var specialist = $('#specialist').val();
        var qualification = $('#qualification').val();
        var schedule = $('#schedule').val();
        var specialistOrPractice = $('#specialistOrPractice').val();

        if (name === '') {
            $('#name').after('<small class="error-msg text-danger">Please enter patient name.</small>');
            isValid = false;
        }

        if (email === '') {
            $('#email').after('<small class="error-msg text-danger">Please enter an email.</small>');
            isValid = false;
        }

        if (password === '') {
            $('#password').after('<small class="error-msg text-danger">Please enter a password.</small>');
            isValid = false;
        }

        if (phone === '') {
            $('#phone').after('<small class="error-msg text-danger">Please enter a phone number.</small>');
            isValid = false;
        } else if (!(/^\d{10}$/.test(phone))) {
            $('#phone').after('<small class="error-msg text-danger">Please enter a 10-digit phone number.</small>');
            isValid = false;
        }

        if (address === '') {
            $('#address').after('<small class="error-msg text-danger">Please enter an address.</small>');
            isValid = false;
        }

        if (date_of_birth === '') {
            $('#date_of_birth').after('<small class="error-msg text-danger">Please enter a date of birth.</small>');
            isValid = false;
        }

        if (specialist === 'n/a') {
            $('#specialist').after('<small class="error-msg text-danger">Please select a specialist.</small>');
            isValid = false;
        }

        if (qualification === '') {
            $('#qualification').after('<small class="error-msg text-danger">Please enter a qualification.</small>');
            isValid = false;
        }

        if (schedule === '') {
            $('#schedule').after('<small class="error-msg text-danger">Please enter a schedule.</small>');
            isValid = false;
        }

        if (specialistOrPractice === '') {
            $('#specialistOrPractice').after('<small class="error-msg text-danger">Please select a preference.</small>');
            isValid = false;
        }

        if (isValid) {
            // If all validations pass, submit the form
            this.submit();
        }
    });
});

</script>

<?= $this->endSection() ?>
