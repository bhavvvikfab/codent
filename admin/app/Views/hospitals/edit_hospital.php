<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Edit Dental practice
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Edit Dental practice</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href='<?= site_url('/dashboard') ?>'>Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Dental practice</li>
          </ol>
        </nav>
      </div>
    </div>
    </div>

<section class="section" id="addsupform96">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
          	<div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Edit Dental practice</h5>
                  </div>
                   <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href='<?= site_url('/hospitals') ?>'> Back </a></h5>
                  </div>
                </div>
             </div>
            <div class="card-body">
         

             <!--edit hospital Form Elements -->
             <form id="update_hospital" method="post" action="<?= base_url('edit_hospital')?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= isset($hospital['id']) ? $hospital['id'] : '' ?>">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle"
                    style="font-size: 18px;"></i> Dental practice Name</label>
            <input type="text" class="form-control" id="hospital_name" name="hospital_name" value="<?= isset($hospital['fullname']) ? $hospital['fullname'] : '' ?>">
            <?php if (session('errors.hospital_name')): ?>
                <small class="text-danger"><?= esc(session('errors.hospital_name')) ?><i class="bi bi-exclamation-circle"></i></small>
            <?php endif; ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill"
                    style="font-size: 18px;"></i> Phone Number</label>
            <input type="phone" class="form-control" id="phone" name="phone" value="<?= isset($hospital['phone']) ? $hospital['phone'] : '' ?>" >
            <?php if (session('errors.phone')): ?>
                <small class="text-danger"><?= esc(session('errors.phone')) ?><i class="bi bi-exclamation-circle"></i></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="inputEmail" class="form-label"><i class="bi bi-envelope-fill"
                    style="font-size: 18px;"></i> Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($hospital['email']) ? $hospital['email'] : '' ?>" readonly>
            <?php if (session()->getFlashdata('emailError')): ?>
    <div style='color: red; '>
        <?= session()->getFlashdata('emailError') ?>
    </div>
<?php endif; ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="inputPassword" class="form-label"><i class="bi bi-eye-slash-fill"
                    style="font-size: 18px;"></i> Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <?php if (session('errors.password')): ?>
                <small class="text-danger"><?= esc(session('errors.password')) ?><i class="bi bi-exclamation-circle"></i></small>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="inputPassword" class="form-label"> <i class="bi bi-geo-alt-fill"
                    style="font-size: 18px;"></i> Address</label>
            <textarea class="form-control" style="height: 100px" id="address" name="address"><?= isset($hospital['address']) ? $hospital['address'] : '' ?></textarea>
            <?php if (session('errors.address')): ?>
                <small class="text-danger"><?= esc(session('errors.address')) ?><i class="bi bi-exclamation-circle"></i></small>
            <?php endif; ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="inputPassword" class="form-label"> <i style="font-size: 18px;"
                    class="bi bi-file-earmark-person"></i> About </label>
            <textarea class="form-control" style="height: 100px" id="about" name="about"><?= isset($hospital_data['note']) ? $hospital_data['note'] : '' ?></textarea>
            <?php if (session('errors.about')): ?>
                <small class="text-danger"><?= esc(session('errors.about'))?><i class="bi bi-exclamation-circle"></i></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="packageSelect" class="form-label">
                <i class="bi bi-credit-card-fill" style="font-size: 18px;"></i> Select Plan
            </label>
            <select class="form-control" id="packageSelect plan_name" name="plan_name" value="">
                <option value="">--Select--Plan--</option>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $plan): ?>
                        <option value="<?php echo $plan['id']; ?>"><?php echo $plan['plan_name']; ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">No plan available</option>
                <?php endif; ?>
            </select>
            <?php if (session('errors.plan_name')): ?>
                <small class="text-danger"><?= esc(session('errors.plan_name')) ?><i class="bi bi-exclamation-circle"></i></small>
            <?php endif; ?>
        </div> -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <label for="profile" class="form-label"><i class="bi bi-image-fill"
                    style="font-size: 18px;"></i> Profile Image</label>
            <input class="form-control" type="file" name="profile" value="<?= isset($hospital['profile']) ? $hospital['profile'] : '' ?>">
        </div>
    </div>
    <div class="row mb-3">
        <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
        <div class="col-sm-12">
            <button class="btn editsup-btn" type="submit">Save Changes</button>
        </div>
    </div>
</form>

                        <!-- End hospital Form Elements -->

            </div>
          </div>

        </div>

        <!--  --><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php if (session()->has('hospital_edit_status') && session('hospital_edit_status') == 'error'): ?>
        <script>
            showToast('Error...Something want wrong...!!');  
        </script>
    <?php endif; ?>
</main>
<script>
   $(document).ready(function() {
    $('#update_hospital').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Clear previous error messages
        $('.error-msg').remove();
        $('small.text-danger').remove();

        // Perform validation
        var isValid = true; // Flag to track if the form is valid

        var hospital_name = $('#hospital_name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var plan_name = $('#plan_name').val();
        var address = $('#address').val();
        var about = $('#about').val();

        // Validate hospital name
        if (hospital_name === '') {
            $('#hospital_name').after('<small class="error-msg text-danger">Please enter a name.</small>');
            isValid = false;
        }

        // Validate phone number
        if (phone === '') {
            $('#phone').after('<small class="error-msg text-danger">Please enter a phone number.</small>');
            isValid = false;
        } else if (!(/^\d{10,15}$/.test(phone))) {
            $('#phone').after('<small class="error-msg text-danger">Please enter a phone number between 10 and 15 digits.</small>');
            isValid = false;
        }

        // Validate email
        if (email === '') {
            $('#email').after('<small class="error-msg text-danger">Please enter an email.</small>');
            isValid = false;
        }

        // Validate password
        // if (password === '') {
        //     $('#password').after('<small class="error-msg text-danger">Please enter a password.</small>');
        //     isValid = false;
        // }

        // Validate plan name
        if (plan_name === '') {
            $('#plan_name').after('<small class="error-msg text-danger">Please select a plan.</small>');
            isValid = false;
        }

        // Validate address
        // if (address === '') {
        //     $('#address').after('<small class="error-msg text-danger">Please enter an address.</small>');
        //     isValid = false;
        // }

        // Validate about information
        // if (about === '') {
        //     $('#about').after('<small class="error-msg text-danger">Please enter about information.</small>');
        //     isValid = false;
        // }

        // If all validations pass, submit the form
        if (isValid) {
            this.submit(); // Use native form submission method
        }
    });
});


</script>
<?= $this->endSection() ?>
