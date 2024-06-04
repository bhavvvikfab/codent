<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Edit_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Edit User</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href='<?= site_url('/dashboard') ?>'>Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Hospital</li>
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
                      <h5 class="card-title text-start">Edit Hospital</h5>
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
                                 <input type="hidden" name="id" value="<?= $hospital['id'] ?>">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle"
                                            style="font-size: 18px;"></i> Hospital Name</label>
                                    <input type="text" class="form-control" id="hospital_name" name="hospital_name" value="<?= $hospital['fullname']?>">
                                    <?php if (session('errors.hospital_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.hospital_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill"
                                            style="font-size: 18px;"></i> Phone Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" value="<?= $hospital['phone'] ?>" >
                                    <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputEmail" class="form-label"><i class="bi bi-envelope-fill"
                                            style="font-size: 18px;"></i> Email</label>
                                    <input type="email" class="form-control"id="email" name="email" value="<?= $hospital['email'] ?>">
                                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger"><?= esc(session('errors.email')) ?><i class="bi bi-exclamation-circle"></i></small>
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
                                    <label for="packageSelect" class="form-label">
                                        <i class="bi bi-credit-card-fill" style="font-size: 18px;"></i> Select Plan
                                    </label>
                                    <select class="form-control" id="packageSelect plan_name" name="plan_name" value="">
                                        <option value="">--Select--Plan--</option>
                                        <?php if (!empty($data)): ?>
                                            <?php foreach ($data as $plan): ?>
                                                <option value="<?php echo $plan['id']; ?>"><?php echo $plan['plan_name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No plan available</option>
                                        <?php endif; ?>
                                    </select>
                                    <?php if (session('errors.plan_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.plan_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="profile" class="form-label"><i class="bi bi-image-fill"
                                            style="font-size: 18px;"></i> User Image</label>
                                    <input class="form-control" type="file" name="profile" value="<?= $hospital['profile'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputPassword" class="form-label"> <i class="bi bi-geo-alt-fill"
                                            style="font-size: 18px;"></i>Address</label>
                                    <textarea class="form-control" style="height: 100px" id="address" name="address" ><?= $hospital['address'] ?></textarea>
                                    <?php if (session('errors.address')): ?>
                                        <small class="text-danger"><?= esc(session('errors.address')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <!--<?php print_r($hospital_data);?>-->
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputPassword" class="form-label"> <i style="font-size: 18px;"
                                            class="bi bi-file-earmark-person"></i> About </label>
                                    <textarea class="form-control" style="height: 100px" id="about" name="about"><?= $hospital_data['note'] ?></textarea>
                                    <?php if (session('errors.about')): ?>
                                        <small class="text-danger"><?= esc(session('errors.about'))?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
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

    $('#update_hospital').submit(function(event) 
 {
            event.preventDefault(); // Prevent the default form submission

            // Clear previous error messages    
            $('.error-msg').remove();

            // Perform validation
            var hospital_name = $('#hospital_name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var plan_name = $('#plan_name').val();
            var address = $('#address').val();
            var about = $('#about').val();

            

            // var name = $('#name').val();
            // var password = $('#password').val();
            // var address = $('#address').val();
            // var dob = $('#dob').val();
            // var specialist = $('#specialist').val();
            // var qualification = $('#qualification').val();
            // var schedule = $('#schedule').val();
            // var about = $('#about').val();
            // var image = $('#image').val();
            // var specialistOrPractice = $('#specialistOrPractice').val();

            if (hospital_name === '') {
                $('#hospital_name').after('<small class="error-msg text-danger">Please enter a name.</small>');
                return false;
            }

            if (phone === '') {
    $('#phone').after('<small class="error-msg text-danger">Please enter a phone number.</small>');
    return false; 
} else if (!(/^\d{10}$/.test(phone))) {
    $('#phone').after('<small class="error-msg text-danger">Please enter a 10-digit phone number.</small>');
    return false;
}
            if (email == '') {
                $('#email').after('<small class="error-msg text-danger">Please enter an email.</small>');
                return false; 
            }

            if (password === '') {
                $('#password').after('<small class="error-msg text-danger">Please enter a password.</small>');
                return false; 
            }
            
        
            
            
            if (address === '') {
                $('#address').after('<small class="error-msg text-danger">Please enter an address.</small>');
                return false; 
            }

            if (about === '') {
                $('#about').after('<small class="error-msg text-danger">Please enter about information.</small>');
                return false;
            }

            // if (dob === '') {
            //     $('#dob').after('<small class="error-msg text-danger">Please enter a date of birth.</small>');
            //     return false; 
            // }

            

            // if (specialist === 'n/a') {
            //     $('#specialist').after('<small class="error-msg text-danger">Please select a specialist.</small>');
            //     return false; 
            // }

            // if (qualification === '') {
            //     $('#qualification').after('<small class="error-msg text-danger">Please enter a qualification.</small>');
            //     return false; 
            // }
            // if (schedule === '') {
            //     $('#schedule').after('<small class="error-msg text-danger">Please enter a schedule.</small>');
            //     return false; 
            // }

            // if (about === '') {
            //     $('#about').after('<small class="error-msg text-danger">Please enter about information.</small>');
            //     return false;
            // }

            // if (image === '') {
            //     $('#image').after('<small class="error-msg text-danger">Please select an image.</small>');
            //     return false; 
            // }

            // if (specialistOrPractice === '') {
            //     $('#specialistOrPractice').after('<small class="error-msg text-danger">Please select a preference.</small>');
            //     return false; 
            // }

            // If all validations pass, submit the form
            this.submit();
        });
    });

</script>
<?= $this->endSection() ?>
